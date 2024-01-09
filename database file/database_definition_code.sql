
DROP DATABASE IF EXISTS taskmanagerproject;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



create database taskmanagerproject;
GRANT USAGE ON *.* TO 'root'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost';
FLUSH PRIVILEGES;
use taskmanagerproject;
-- database： `taskmanagerproject`
--

-- --------------------------------------------------------

--
-- table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(20) DEFAULT NULL,
  `task_description` varchar(60) DEFAULT NULL,
  `completion_status` tinyint(1) DEFAULT NULL,
  `task_priority` varchar(10) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- insert into `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `task_description`, `completion_status`, `task_priority`, `due_date`, `user_id`) VALUES
(3, 'task3', NULL, 1, '1', '2023-11-20', 3),
(4, 'task4', NULL, 0, '1', '2023-11-20', 3),
(5, 'dd', 'come from html', 0, '2', '2023-11-23', NULL),
(6, 'aaa', 'adfaf', 0, '1', '2023-11-22', 2),
(7, 'qaz', 'asdfadf', 1, '1', '2023-11-25', 2);

-- --------------------------------------------------------

--
-- table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- insert into `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `email`, `password`) VALUES
(2, 'test', NULL, NULL, NULL, '$2y$10$MTS1JpN/FGDtCANvl7WfbeD6k.hOtfRWUQzmW4eeTUsyOMpUL6hFu'),
(3, 'helen', NULL, NULL, NULL, '$2y$10$KHQbfg.eV2eiE8iHTy7jZeWIo7jfwoYD7g3l41gMLA6w2VBVqmhea'),
(4, 'test1', 'kk', 'dd', 'test1@gmail.com', '$2y$10$Fb2i7kKSkvZIYi5i3EgIK.gXoGRaoiwHXgkljbGR.jEdGYfcUHKiy'),
(11, '', '', '', '', '$2y$10$Y.A44YAY5R5JeCJn3mqVIO3BKnlW21DoG7NLT0t6yQpVYtESCNwkW'),
(22, 'test44', 'dd', 'ss', 'ss@gmail.com', '$2y$10$IacKgS6vKu7CI.cOjIfebOTo9Q.WqgfBOWmu7EJbksfsNgAoVruHC'),
(24, 'test45', 'dd', 'ss', 'ss44@gmail.com', '$2y$10$N4oQ3Wsf6Jk8xwnGKNcKo.En8A7p4qLBSjttVbEW9rZ1E5Isqm9xu'),
(25, 'test5', 'dd', 'ss', 'dd@gmail.com', '$2y$10$hTHupitwoTgx2G5d9Mxd4uJ9/XAm4whDDc73wzyxNYN.g45c7m/Ze'),
(26, 'sree', 'sree', 'sree', 'deng.hneng@gmail.com', '$2y$10$nzluY5ZhU/9.UmF1G80xU.6Zv9RV0.PExnxqj094F1QmUrnhNdOza'),
(30, 'helen12345 ', 'H', 'D', '123@gmail.com', '$2y$10$gQsprNTw2LOyB1zmRKy68evgmxxU9zH3Vlj0EjagNNrrWssk5yYdG'),
(33, 'helenxyz', 'ddd', 'hhh', '2111@gmail.com', '$2y$10$PHi33ABrkYeEddL0jLeScOU2X..LJ8rgj0O6P6zHir7wgSbkjpnxy');

--
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT
--

--
-- AUTO_INCREMENT `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- add constraints to tables
--

--
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;


