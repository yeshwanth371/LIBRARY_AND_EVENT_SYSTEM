# LIBRARY_AND_EVENT_SYSTEM

**Introduction **
 
The Library Management System is a software application designed to manage the operations of a library and to announce the Events related to college. The system automates the processes of book acquisition, cataloguing, circulation, and the management of library resources. The system provides a user-friendly interface for library users to search for books, reserve books, and manage their accounts. The system also provides tools for librarians to manage the library resources effectively. 
 
**Project Aims and Objectives **
 
The project aims and objectives that will be achieved after completion of this project are discussed in this subchapter. The aims and objectives are as follows: 
**ADMIN: **
1.	Sign in and signup 	 	 
2.	Add books 	 	 	 
3.	Delete book 	 	 	 
4.	View books 	 	 	 
5.	Issue book 	 	 	 
6.	Return books  	 
7.	History  	 	 	 
8.	Manage request 
9.	Description 
10.	Venue (Date and Time) 
11.	Who can participate 
 
 
**USER: **
1.	Sign in and signup 	 	 
2.	View books 	 	 	 
3.	History 	 	 	 
4.	Request book 
5.	Access online e-book 
6.	Search book based on book name, author, Etc 
7.	Can view the count of the books available in the library. 
8.	Description 
9.	Venue (Date and Time) 
10.	Who can participate 
 
**Software Tools Used **
 
The whole project is divided into two parts front-end and back-end. The architecture used in doing the project is LAMP (Linux Apache Mysql PHP). 
 	**Front-End: **
 	 	The front end is designed using HTML, CSS, Java Script. 
 	**Back-End: **
 	 	The Back-end is designed using PHP and MYSQL. 

**System Design** 
 
The various relations used maintain Information in MYSQL are as follows: 
Users(sid, name ,email ,phone, password); sid is primary key 
Books(bid, bname, author, edition); bid is the primary key 
Issuedbooks(bid, regno, issueddate, status, returndate) 
 
 
