## Basic Information

### Registration Page:

* Must have unique email address
* Must have unique username
* Must confirm password

### Registration Process:

Upon registration submit:
* User is added db
* Unique 32 character encrypted key is added
* User is set as not active
* User is added with no role
* Confirmation email sent
* Upon Confirmation (User clicks link):
* User is set to active
* User is assigned member role
* Unique 32 character encrypted key is changed
* User is redirect to login page with registration confirmation message
* Redirected to confirm_thanks page asking to check email and confirm the registration

### Members Area:
User are automatically directed to this page if they are NOT admins.

#### Members only Page

* View profile link
* Logout link

#### View Profile Page

* Displays basic user informaion (usernam, email, first and last name)
* Back to Members Area link
* Change Password link
* Edit Profile link
* Logout link

#### Change Password Page

* Password field
* Confirm Password field
* Back to Profile link
* Logout link

#### Edit Profile Page

* Displays username (not editable)
* Displays Email (not editable)
* First Name (editable)
* Last Name (editable)
* Back to Profile link
* Logout link

### Admins Only Area
User are redirected to this page automatically if they have admin role.

#### Admin Only Page

* Add User link
* Users link
* Members Area link
* View Profile link
* Logout link

#### Add User Page

* Page not developed

#### Users Page

* Displays all users and user information (username, first and last name, email, role, Active) in table format
* Each users has Edit link
* Each user has either Activate link or Disable link depeding on if they are active or not.
* Add User link
* Users link
* Members Area link
* View Profile link
* Logout link

#### Members Area Page

* Same as Members Area Page above
* Only difference - Has Admin Area link

#### View Profile Page

* Same as View Profile above