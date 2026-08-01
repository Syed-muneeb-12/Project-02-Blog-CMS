# Project 2 – Blog CMS

## 1. Project Goal

The goal of this project is to build a complete Blog Content Management System (CMS) similar to a simplified WordPress application. The platform will allow users to read, create, manage, and interact with blog posts while providing administrators with moderation and management tools. The project is designed to strengthen Laravel fundamentals by implementing real-world features and best development practices.

---

## 2. User Roles

The application will have three types of users:

### Guest

A guest is any visitor who has not registered or logged in.

### Registered User

A registered user can create and manage their own content after logging into the application.

### Administrator

An administrator has full control over the platform, including user and content management.

---

## 3. Features

### Guest Features

* View all published blog posts.
* Read individual blog posts.
* Search blog posts by keywords.
* Filter blog posts by category.

---

### Registered User Features

* Register and log into the application.
* Create new blog posts.
* Edit their own blog posts.
* Delete their own blog posts.
* Upload a featured image for each blog post.
* Add comments to blog posts.
* Edit their own comments.
* Delete their own comments.
* Search and filter blog posts.

---

### Administrator Features

* Access all user features.
* View and manage all blog posts.
* Edit or delete any user's blog post.
* Edit or delete any comment.
* Ban or deactivate users when necessary.
* Create, edit, and delete blog categories.
* Moderate the overall platform.

---

## 4. Media Support

For this project, each blog post will support a single featured image.

Supported image formats:

* JPG
* JPEG
* PNG
* WEBP

Support for additional file types such as PDFs or documents will be considered in future projects after learning Laravel's file upload system in greater depth.

---

## 5. Learning Objectives

By completing this project, the following Laravel concepts should be understood and practiced:

* Resource Controllers
* Eloquent Relationships
* Authentication and Authorization
* CRUD Operations
* Form Validation
* File Uploads
* Search Functionality
* Filtering
* Pagination
* Route Model Binding
* Slugs
* Blade Components
* Middleware
* Database Design
