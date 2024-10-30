# MDPI Article Scraper and Viewer

## Project Overview

This project is a web application that scrapes articles from the MDPI (Multidisciplinary Digital Publishing Institute) platform using a Java-based scraper and presents the data through a Laravel PHP web application. Users can input search queries and specify the number of articles to scrape, which are then stored in a SQL database for retrieval and display.

## Features

- **Search Functionality**: Users can enter keywords and specify the number of articles to scrape.
- **Database Storage**: Scraped articles are stored in a SQL database.
- **Web Interface**: Articles are displayed in a user-friendly Laravel web application.
- **Article Details**: Users can view detailed information about each article.
- **Link to Original Articles**: Users can access the original articles on the MDPI website.

## Technology Stack

- **Backend Scraper**: Java (using Jsoup for HTML parsing)
- **Web Frontend**: Laravel (PHP Framework)
- **Database**: MySQL

## Installation

### Prerequisites

- **Java JDK**: Ensure you have Java Development Kit installed.
- **MySQL**: Ensure you have MySQL installed and running.
- **Composer**: Ensure you have Composer installed for managing Laravel dependencies.
- **PHP**: Ensure you have PHP installed (version 7.3 or higher recommended).
- **XAMPP**: Optional, but recommended for running the Laravel application locally.

### Steps to Install

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/yourrepository.git
   cd yourrepository
   ```

2. **Set Up the Database**:
   - Create a new database in MySQL (e.g., `mdpi_articles2`).
   - Create the necessary tables:
     ```sql
     CREATE TABLE search_requests (
         id INT AUTO_INCREMENT PRIMARY KEY,
         search_query VARCHAR(255) NOT NULL,
         number_of_articles INT NOT NULL,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );

     CREATE TABLE articles (
         article_number INT NOT NULL,
         title VARCHAR(255) NOT NULL,
         authors TEXT NOT NULL,
         publication_year VARCHAR(4) NOT NULL,
         journal VARCHAR(255) NOT NULL,
         doi VARCHAR(255) NOT NULL,
         abstract TEXT NOT NULL,
         created_at TIMESTAMP NULL,
         updated_at TIMESTAMP NULL
     );
     ```

3. **Configure Laravel**:
   - Navigate to the Laravel directory:
     ```bash
     cd laravel_project_directory
     ```
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database credentials:
     ```plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=mdpi_articles2
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Install Laravel Dependencies**:
   ```bash
   composer install
   ```

5. **Run Migrations (if applicable)**:
   ```bash
   php artisan migrate
   ```

6. **Run the Java Scraper**:
   - Ensure your Java environment is set up and run the Java scraper class. You may need to include the Jsoup library in your project.
   ```bash
   javac MDPScraper_To_DB.java
   java MDPScraper_To_DB
   ```

7. **Start the Laravel Development Server**:
   ```bash
   php artisan serve
   ```

## Usage

- **Access the Application**: Open your web browser and navigate to `http://localhost:8000` (or the port specified by Laravel).
  
- **Search for Articles**:
  - Go to the scrape form: `/scrape`.
  - Enter your search query and the number of articles you wish to scrape.
  - Submit the form to initiate the scraping process.

- **View Scraped Articles**: After scraping, articles will be displayed on the main articles index page.

- **View Article Details**: Click on any article to view detailed information.

- **Link to Original Articles**: Use the "View in origin site" button to access the full article on the MDPI website.

## Laravel Routes

The following routes are defined in the Laravel application:

| Method | URI                | Action                     |
|--------|--------------------|----------------------------|
| GET    | /                  | Home                       |
| GET    | articles/{article} | Show specific article      |
| GET    | scrape             | Show scrape form           |
| POST   | scrape             | ScrapeController@submit    |


## Contact

Mosbah Messaoud - mosbah47messaoud@gmail.com


