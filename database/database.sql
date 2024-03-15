--Example structure how database may look

CREATE TABLE articles (
                          id INT PRIMARY KEY AUTO_INCREMENT,
                          title VARCHAR(255) NOT NULL,
                          text TEXT NOT NULL,
                          creation_date DATE NOT NULL
);

CREATE TABLE authors (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         name VARCHAR(255) NOT NULL
);

CREATE TABLE article_author (
                                article_id INT,
                                author_id INT,
                                FOREIGN KEY (article_id) REFERENCES articles(id),
                                FOREIGN KEY (author_id) REFERENCES authors(id)
);

-- Inserting example authors
INSERT INTO authors (name) VALUES ('Autor 1'), ('Autor 2'), ('Autor 3');
