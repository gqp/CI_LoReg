Codeigniter Login and Registration System
=========================================

This Codeigniter Login and Registration System is a work in progress. I developed this with simplicity in mind.
I wanted people to be able to use this code and not have to worry about the look of it. So there is no styling
at all. Only basic html elements. This allows you to take it and eaisly add your own styles or incorporate it
into a bootstrap template or any template for that matter. So it may be ugly, but it's on purpose.

Registration Page:
------------------

* Must have unique email address
* Must have unique username
* Must confirm password

Registration Process:
---------------------
  
  Upon registration submit:
  
  * User is added db
  * Unique 32 character encrypted key is added
  * User is set as not active
  * User is added with no role Email confirmation is sent to user with link to confirm
  
  Upon Confirmation (User clicks link):

  * User is set to active
  * User is assigned member role
  * Unique 32 character encrypted key is changed
  * User is redirect to login page with registration confirmation message
  * Redirected to confirm_thanks page asking to check email and confirm the registration

Members Area
-----------
User are automatically directed to this page if they are NOT admins.

  Members Only Page
  
  * View profile link
  * Logout link
  
  View Profile Page

  * Displays basic user informaion (usernam, email, first and last name)
  * Back to Members Area link
  * Change Password link
  * Edit Profile link
  * Logout link
  
  Change Password Page

  * Password field
  * Confirm Password field
  * Back to Profile link
  * Logout link

  Edit Profile Page
  
  * Displays username (not editable)
  * Displays Email (not editable)
  * First Name (editable)
  * Last Name (editable)
  * Back to Profile link
  * Logout link

Admins Only Area
================
User are redirected to this page automatically if they have admin role.

  Admin Only Page
  
  * Add User link
  * Users link
  * Members Area link
  * View Profile link
  * Logout link
  
  Add User Page

  * Page not developed
  
  Users Page

  * Displays all users and user information (username, first and last name, email, role, Active) in table format
  * Each users has Edit link
  * Each user has either Activate link or Disable link depeding on if they are active or not.
  * Add User link
  * Users link
  * Members Area link
  * View Profile link
  * Logout link

  Members Area Page
  
  * Same as Members Area Page above 
  * Only difference - Has Admin Area link
  
  View Profile Page
  * Same as View Profile above

