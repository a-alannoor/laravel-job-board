-- SQLite
SELECT post_id, COUNT(post_id) AS comment_count
FROM comments
GROUP BY post_id;