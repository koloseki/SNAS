
CREATE TABLE articles (
                          id INT PRIMARY KEY AUTO_INCREMENT,
                          title VARCHAR(255) NOT NULL,
                          text TEXT NOT NULL,
                          created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
INSERT INTO authors (name) VALUES ('J.R.R. Tolkien'), ('H.P. Lovecraft'), ('Akira Toriyama');
