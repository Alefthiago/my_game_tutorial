CREATE SCHEMA projetoepratica DEFAULT CHARACTER SET utf8 ;
USE projetoepratica ;


CREATE TABLE USERS 
(
  user_id INT NOT NULL AUTO_INCREMENT,
  user_name VARCHAR(100) NOT NULL,
  user_email VARCHAR(100) NOT NULL,
  user_username VARCHAR(45) NOT NULL,
  user_password VARCHAR(255) NOT NULL,
  user_type ENUM('adm', 'com') NOT NULL DEFAULT 'com',
  CONSTRAINT USERS_PK PRIMARY KEY (user_id),
  UNIQUE INDEX email_UNIQUE (user_email ASC),
  UNIQUE INDEX username_UNIQUE (user_username ASC)
);


CREATE TABLE POSTS 
(
  post_id INT NOT NULL AUTO_INCREMENT, 
  post_title VARCHAR(255) NOT NULL,
  post_content MEDIUMTEXT NOT NULL,
  post_date DATETIME(6) NOT NULL,
  USERS_user_id INT NOT NULL,
  CONSTRAINT POSTS_PK PRIMARY KEY (post_id),
  CONSTRAINT POSTS_USERS_FK FOREIGN KEY (USERS_user_id) REFERENCES USERS (user_id)
);


CREATE TABLE COMMENTS 
(
  comment_id INT NOT NULL AUTO_INCREMENT,
  comment_text TEXT(500) NOT NULL,
  comment_date DATETIME(6) NOT NULL,
  USERS_user_id INT NOT NULL,
  POSTS_post_id INT NOT NULL,
  CONSTRAINT COMMENTS_PK PRIMARY KEY (comment_id),
  CONSTRAINT COMMENTS_USERS_FK FOREIGN KEY (USERS_user_id) REFERENCES USERS (user_id),
  CONSTRAINT COMMENTS_POSTS_FK FOREIGN KEY (POSTS_post_id) REFERENCES POSTS (post_id)
);


CREATE TABLE TAGS
(
  tag_id INT NOT NULL AUTO_INCREMENT,
  tag_name VARCHAR(45) NOT NULL,
  CONSTRAINT TAGS_PK PRIMARY KEY (tag_id)
);


CREATE TABLE POSTS_has_TAGS 
(
  POSTS_post_id INT NOT NULL,
  TAGS_tag_id INT NOT NULL,
  CONSTRAINT POSTS_has_TAGS_PK PRIMARY KEY (POSTS_post_id, TAGS_tag_id),
  CONSTRAINT POSTS_has_TAGS_POSTS_FK FOREIGN KEY (POSTS_post_id) REFERENCES POSTS (post_id),
  CONSTRAINT POSTS_has_TAGS_TAGS_FK FOREIGN KEY (TAGS_tag_id) REFERENCES TAGS (tag_id)
);