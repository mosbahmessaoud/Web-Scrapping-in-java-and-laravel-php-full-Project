# MDPI Article Scraper and Viewer

## Project Overview

This project combines a Java-based web scraper with a Laravel PHP web application to search, scrape, and display articles from the MDPI (Multidisciplinary Digital Publishing Institute) platform.

## Features

- Search for articles on MDPI using keywords
- Specify the number of articles to scrape
- Scrape article details including title, authors, abstract, and more
- Store scraped data in a SQL database
- Display scraped articles in a web interface
- View detailed information for each article
- Link to original MDPI articles

## Technology Stack

- Backend Scraper: Java
- Web Frontend: Laravel (PHP)
- Database: SQL

## How It Works

1. **User Input**: Users enter a search query and the number of articles to scrape through a Laravel-based web interface.
2. **Data Storage**: The search request is saved in the `search_requests` table in the database.
3. **Java Scraper**: The Java application retrieves the search request from the database and uses it to scrape articles from MDPI.
4. **Article Storage**: Scraped articles are saved in the `articles` table in the database.
5. **Article Display**: The Laravel application retrieves and displays the scraped articles in a user-friendly web interface.

## Setup and Installation

[Include instructions for setting up both the Java scraper and Laravel application, including database configuration]

## Usage

1. Navigate to the search page in the Laravel application.
2. Enter your search query and the number of articles you want to scrape.
3. Submit the form to initiate the scraping process.
4. View the scraped articles on the results page.
5. Click on an article to view its details.
6. Use the "View in origin site" button to access the full article on MDPI.

## Project Structure

[Briefly describe the structure of your project, including key directories and files for both Java and Laravel components]

## Contributing

[Include guidelines for contributing to your project]

## License

[Specify the license under which your project is released]

## Contact

Mosbah Messaoud - [Your contact information]

Project Link: [Your GitHub repository URL]
