## Adminpanel to manage companies
# Basically, project to manage companies and their employees. Mini-CRM.
- Basic Laravel Auth: ability to log in as administrator
- Use database seeds to create first user with email admin@admin.com and password "password"
- CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and - Employees.
- Companies DB table consists of these fields: Name (required), email, logo (minimum 100x100), - website
- Employees DB table consists of these fields: First name (required), last name (required), - Company (foreign key to Companies), email, phone
- Use database migrations to create those schemas above
- Store companies logos in storage/app/public folder and make them accessible from public
- Use basic Laravel resource controllers with default methods - index, create, store etc.
- Use Laravel's validation function, using Request classes
- Use Laravel's pagination for showing Companies/Employees list, 10 entries per page
- Use Laravel's starter kit for auth and basic theme, but remove ability to register


Basically, that's it. With this simple exercise junior developer shows the skills in basic Laravel things:

- MVC
- Auth
- CRUD and Resource Controllers
- Eloquent and Relationships
- Database migrations and seeds
- Form Validation and Requests
- File management
- Basic front-end by Starter Kits
- Pagination

Guess what - most of the basics web-applications will have these functions as core. There will be a lot more on top of that, but without these fundamentals you cannot move further.

So this task would actually test if the person can create simple projects. And then it's practice, practice, practice on more projects, each of them individual and adding more to their knowledge base.

From my own experience, different developers are "creative" in different code places - some don't use Resource controllers and put Route::get everywhere, some don't validate forms, some don't test their code properly etc. That's exactly the things you want to spot as early as possible.