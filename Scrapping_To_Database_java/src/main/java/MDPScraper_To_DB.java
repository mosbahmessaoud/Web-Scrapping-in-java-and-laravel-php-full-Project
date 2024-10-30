import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class MDPScraper_To_DB {

    private static final String DB_URL = "jdbc:mysql://localhost:3306/mdpi_articles2"; // Database name
    private static final String DB_USER = "root"; // MySQL username
    private static final String DB_PASSWORD = ""; // MySQL password
    
    
    

    public static void main(String[] args) throws SQLException, IOException {
    	
    	
    	
        // Database connection
        Connection connection = DriverManager.getConnection(DB_URL, DB_USER, DB_PASSWORD);
        System.out.println("Database connection successful.");
        
        

        // Retrieve the request from the table 'search_requests' 
        String searchQuery = "";
        int number_ar = 0;

        String searchRequestSql = "SELECT search_query, number_of_articles FROM search_requests ORDER BY created_at DESC LIMIT 1";
        PreparedStatement searchRequestStmt = connection.prepareStatement(searchRequestSql);
        ResultSet searchRequestRs = searchRequestStmt.executeQuery();

        if (searchRequestRs.next()) {
            searchQuery = searchRequestRs.getString("search_query").trim().replace(" ", "+");
            number_ar = searchRequestRs.getInt("number_of_articles");
        } 
        System.out.println("the keyword to searshing about it is  : " + searchQuery );
        System.out.println("Number of articles te get is  : " + number_ar );

        


        
        
        String BASE_URL = "https://www.mdpi.com/search?q=" + searchQuery + "&article_type=research-article&page_no=";
        final int ARTICLE_LIMIT = number_ar; 
        
        
        List<Map<String, Object>> articles = new ArrayList<>();
        int currentPage = 1;

//  continue the article number from the last one 
        int ar_number =0 ;
        PreparedStatement maxStmt = connection.prepareStatement("SELECT MAX(article_number) FROM articles");
        ResultSet rs = maxStmt.executeQuery();
        if (rs.next()) {
        	ar_number = rs.getInt(1); // Get the max article_number
        }

        // Prepare the SQL statement for inserting articles
        String sql = "INSERT INTO articles (article_number, title, authors, publication_year, journal, doi, abstract, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NULL, NULL)";
        PreparedStatement preparedStatement = connection.prepareStatement(sql);

        
        
        
        

        // Scraping loop
        while (articles.size() < ARTICLE_LIMIT) {
            Document doc = Jsoup.connect(BASE_URL + currentPage).get();
            Elements articleElements = doc.select(".generic-item.article-item");
            System.out.println("Number of the page : " + currentPage );

            // Check if there are no articles
            if (articleElements.isEmpty()) {
                System.out.println("No more articles found. Exiting.");
                break; 
            }


            
            for (Element article : articleElements) {
                if (articles.size() >= ARTICLE_LIMIT) break; // Stop if we reach the limit
                ar_number=ar_number+1; // Increment the article number
             
                // Extracting details
                String title = article.select(".title-link").text();
                String authors = String.join(", ", article.select(".authors strong").eachText()); // Join authors with commas
                String publicationYear = article.select(".color-grey-dark b").first().text();
                String journal = article.select(".color-grey-dark em").first().text();
                String doi = article.select(".color-grey-dark a").attr("href").replace("https://doi.org/", "").trim();
                String abstractText = article.select(".abstract-cropped").text();

                // Insert into database
                preparedStatement.setInt(1, ar_number);
                preparedStatement.setString(2, title);
                preparedStatement.setString(3, authors);
                preparedStatement.setString(4, publicationYear);
                preparedStatement.setString(5, journal);
                preparedStatement.setString(6, doi);
                preparedStatement.setString(7, abstractText);
                preparedStatement.addBatch();

                // Add to the list
                Map<String, Object> articleMap = new HashMap<>();
                articleMap.put("title", title);
                articleMap.put("authors", authors);
                articleMap .put("publication_year", publicationYear);
                articleMap.put("journal", journal);
                articleMap.put("doi", doi);
                articleMap.put("abstract", abstractText);
                articles.add(articleMap);
            }

            // Execute the batch
            preparedStatement.executeBatch();

            // next page
            currentPage++;
        }

        connection.close();
        System.out.println("Database connection closed.");
    }
}