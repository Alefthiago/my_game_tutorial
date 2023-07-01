CREATE SCHEMA projetoepratica DEFAULT CHARACTER SET utf8;
USE projetoepratica ;


CREATE TABLE users 
(
  user_id INT NOT NULL AUTO_INCREMENT,
  user_name VARCHAR(100) NOT NULL,
  user_email VARCHAR(100) NOT NULL,
  user_username VARCHAR(45) NOT NULL,
  user_password VARCHAR(255) NOT NULL,
  user_type ENUM('adm', 'com') NOT NULL DEFAULT 'com',
  CONSTRAINT users_pk PRIMARY KEY (user_id),
  UNIQUE INDEX email_UNIQUE (user_email ASC),
  UNIQUE INDEX username_UNIQUE (user_username ASC)
);


CREATE TABLE posts
(
  post_id INT NOT NULL AUTO_INCREMENT, 
  post_tag VARCHAR(100) NOT NULL,
  post_content MEDIUMTEXT NOT NULL,
  post_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
  post_path_file VARCHAR(500),
  post_file_type VARCHAR(100),
  users_username VARCHAR(45) NOT NULL,
  users_user_id INT NOT NULL,
  CONSTRAINT posts_pk PRIMARY KEY (post_id),
  CONSTRAINT posts_users_fk FOREIGN KEY (users_user_id) REFERENCES users (user_id)
);


CREATE TABLE comments  
(
  comment_id INT NOT NULL AUTO_INCREMENT,
  comment_text TEXT(500) NOT NULL,
  comment_link VARCHAR(500),
  comment_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
  users_user_id INT NOT NULL,
  posts_post_id INT NOT NULL,
  CONSTRAINT comments_PK PRIMARY KEY (comment_id),
  CONSTRAINT comments_users_fk FOREIGN KEY (users_user_id) REFERENCES users (user_id),
  CONSTRAINT comments_posts_fk FOREIGN KEY (posts_post_id) REFERENCES posts (post_id)
);


CREATE TABLE tags 
(
  tag_id INT NOT NULL AUTO_INCREMENT,
  tag_name VARCHAR(45) NOT NULL,
  CONSTRAINT tags_PK PRIMARY KEY (tag_id)
);


CREATE TABLE posts_has_tags 
(
  posts_post_id INT NOT NULL,
  tags_tag_id INT NOT NULL,
  CONSTRAINT posts_has_tags_pk PRIMARY KEY (posts_post_id, tags_tag_id),
  CONSTRAINT posts_has_tags_posts_fk FOREIGN KEY (posts_post_id) REFERENCES posts (post_id),
  CONSTRAINT posts_has_tags_tags_fk FOREIGN KEY (tags_tag_id) REFERENCES tags (tag_id)
);