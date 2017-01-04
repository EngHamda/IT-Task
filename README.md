# IT-Task

Database Name: it-task

>php artisan --version
	Laravel Framework version 5.3.26

*************************************
# Task Details
Admin Area which will have
	1. Login Page
	2. Dashboard have 3 menus
		Users 
			i. First Name
			ii. Last Name
			iii. E-mail
			iv. Password
		Categories (CURD)
			i. Slug
			ii. English Name
		Posts (CURD)
			i. Category
			ii. English Title
			iii. Arabic Title
			iv. Image
			v. English Description
			vi. Arabic Description

Note that categories and posts modules are translatable 
Frontend: (There’s no design )
	1. List of categories
	2. When you click on any category this will redirect you to this category page which list all posts under this category (pagination: 10 posts by page)
	3. Post will include Title and just 10 words from description and read more button.
	4.when you click on read more button for any post listed at category page this will redirect to single post page which include chosen Post Title, Image, Description.

Note that the Frontend for category and pages in Two languages (English and Arabic).

Here's Laravel Package to be used at this task
For translation: use https://github.com/dimsav/laravel-translatable
