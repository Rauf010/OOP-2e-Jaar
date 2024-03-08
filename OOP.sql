-- Create a table for storing users
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    age INTEGER
);

-- Create a table for storing user posts
CREATE TABLE IF NOT EXISTS posts (
    id INTEGER PRIMARY KEY,
    user_id INTEGER,
    title TEXT NOT NULL,
    content TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert some initial users
INSERT INTO users (username, email, age) VALUES ('Alice', 'alice@example.com', 30);
INSERT INTO users (username, email, age) VALUES ('Bob', 'bob@example.com', 25);

-- Insert some initial posts
INSERT INTO posts (user_id, title, content) VALUES (1, 'First Post', 'This is Alice''s first post.');
INSERT INTO posts (user_id, title, content) VALUES (2, 'Hello World', 'Bob says hello to the world.');

sqlite3 mydatabase.db < create_database.sql
