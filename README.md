# SNAS
SNAS stands for simple news article system. It allows you to create, edit and view articles. It also has an API to get articles by author and top authors of the week.

## Table of Contents

- [Usage](#Usage)
    - [Main Functions](#Main-Functions)
    - [API Endpoints](#API-Endpoints)
- [Self Hosting](#Self-Hosting)
    - [Prerequisites](#Prerequisites)
    - [Installation](#installation)
- [License](#license)


# Usage
The project is currently hosted on Fly.io. You can try out all functions of the application by visiting [https://snas.fly.dev](https://snas.fly.dev)

## Main Functions
### Articles
This is the main page of the application. It lists all the articles in the database. Also show authors of the article and have button to edit.<br>
```http
GET /articles
```
You can try it out there: https://snas.fly.dev/articles

### Create Article
This is the page to create a new article. It has a form to fill in the details of the article.<br>
```http
POST /create
```
You can try to add new article by visiting: https://snas.fly.dev/create

### Edit Article
This is the page to edit an existing article. It has a form to fill in the details of the article.<br>
```http
POST /edit/{id}
```
Try by editing the first post: https://snas.fly.dev/edit/1


## API Endpoints
### Get Article by ID
This will return the article in JSON format along with the author's details and creation date.<br>
```http
GET /api/article/{id}
```
You can try with: https://snas.fly.dev/api/article/1
### Get All Articles by given author
This will return all the articles by the given author in JSON format.<br>
```http
GET /api/author/{id}/articles
```
This will return all articles created by author with id of 2: https://snas.fly.dev/api/author/2/articles

### Get Top 3 Authors
This will return the top 3 authors with the most written articles in current week in JSON format.<br>
```http
GET /api/top-authors
```
Try: https://snas.fly.dev/api/top-authors



# Self Hosting

The project is already hosted on <a href='https://snas.fly.dev/articles'>Fly.io</a> <br>
but you can host it on your own server by following the steps below.

### Prerequisites

- [PHP](https://www.php.net/) (>= 8.2)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [NPM](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/)

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/koloseki/SNAS.git
   ```
2. Navigate to the project directory:

    ```
   cd SNAS
   ```

3. Install PHP and Javascript dependencies:

    ```
    composer install
    npm install
   ```

4. Copy the .env.example file to create a .env file:

    ```
    DB_CONNECTION=mysql
    DB_HOST=your-database-host
    DB_PORT=your-database-port
    DB_DATABASE=your-database-name
    DB_USERNAME=your-database-username
    DB_PASSWORD=your-database-password
   
    SESSION_DRIVER=file
   ```
5. Run script that creates needed tables in your database:

    ```
    php artisan sql:run .\database\database.sql
    ```
6. Generate the application key:

    ```
    php artisan key:generate
    ```

   This command will generate the application key and save it in your `.env` file. This key is used by Laravel for encryption and other security operations.<br><br>

7. Start the development server:

    ```
   php artisan serve
    npm run dev
   ```

Visit http://localhost:8000 in your browser to view the application.



## License

This project is open-source and available under the MIT License.
