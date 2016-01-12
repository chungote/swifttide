### About Swifttide ###

Swifttide is a school management application written in the PHP language, and uses MySQL as its database server. You can manage students attendance, discipline, medical events, generate reports on the fly, print report cards, manage staff, and much more.

### System Requirements ###

Please refer to [Installation Guide](en_Installation.md)

### After The Initial Installation ###

Signin with your first aministrator account.

You are presented with a screen and menu choices on the left.  Click Table Maintenance to further setup the software.

Once you have clicked on Table Maintenance, the menu choices on the left change.  Let's go through them all one at a time and see what needs to be done to get the system up and running and available for other users to start entering student and staff data.

The first item is Configuration.  If you click this, you are presented with the messages the system displays upon login.  The top message is the one everyone sees, it is presented at the login screen.  This is a good place to just say "Welcome to Our School", or "School is Canceled Today", or whatever you wish.  The second box is the message your staff will see when they have successfully logged in, and the third box is the message parents will get when they successfully login.  Near the bottom of the screen is Default City, State and Zip.  Fill these in with whatever city, state and zip most of the students live in.  Now when you enter student information, these values will be filled in for you automatically, saving a whole lot of typing!  (Of course you can change those values on the screens for students who don't have this city, state and zip).  There is also a Default Entry Date, this is the date students will enter the school year.

Our next choice is School Names.  You need to enter at least one school name.  Enter as many as needed.

Next we have subjects.  Enter the subjects students will be enrolling into in your school (i.e. Math, Science, Language Arts, Algebra, Art, etc.)

The next choice is Grade Levels.  It is important to enter these from lowest level to highest level.  Enter the lowest level you plan to track, perhaps Kindergarten.  Then Grade 1, then Grade 2, etc.  You can of course call them whatever you wish (some schools call them Level A, Level B, some just 1, 2, 3, etc.)  It is important to use lowest to highest because when we ask the system to promote for the next year, it will take everyone and move them up one grade.  It looks to this table to see what is the next level to move a student in.  So if you had Grade 6,Grade 7, Grade 5 in the table, when you promoted students from Grade 7, they would show up in Grade 5.

Next we have Rooms.  Should you wish to schedule your students, it is useful to assign Room names.  Just enter in room names in the school that are used for educational instruction.

Next is Manage Terms.  These are grading cycles.  Some schools call them Terms, some call them Quarters, some call them Cycles.  Whatever you need to call them enter them here.  Some say Term 1, Term 2, Term 3, etc, some say Fall Term, Winter Term, etc.  Use what fits your school best.

Our next table is Ethnicities.  Especially in the US, schools must track the ethnicity of the student.  You must enter at least one ethnicity.

Next we have Comments.  These comments appear on report cards and are limited to 50 (????) characters in length.

Next are Attendance codes.  These are all the reasons students might give for being absent or late.

Our next choice is Infraction Codes.  These are all the things students do at school that we wish they wouldn't!  Like "Talking In Class" or "Hitting Another Student".  Again, use the choices that best fit your school.

Next is Generations.  These are items like "Jr.", "Sr.", "3rd", "IV", etc.

Next is Relations.  This is for saying how a contact is related to a student.  Obvious choices might be "Parents", "Mother", "Father", "Legal Guardian", etc.

Next is Titles.  This is for items like "Mr.", "Mrs.", "Dr.", etc.

And our last choice is Custom Fields.  I recommend waiting before you add any custom fields to see if we don't already have them in the system.
