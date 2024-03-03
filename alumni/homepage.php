<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Alumni nexus</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: white;
            /* Add background color for better readability */
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo {
            font-size: 2rem;
        }

        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu li {
            margin-right: 20px;
        }

        .menu li:last-child {
            margin-right: 0;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            transition: color 0.3s;
            font-size: 22px;
            margin: 5px;
            line-height: 90px;
        }

        .menu a:hover {
            color: #ff7f50;
            /* Change to your desired hover color */
        }

        .menu-icon {
            display: none;
            font-size: 1.5em;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .menu {
                display: none;
            }

            .menu-icon {
                display: block;
            }

            .menu-icon:checked+.menu {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 40px;
                left: 20px;
                background-color: #333;
                width: 100%;
            }

            .menu-icon:checked+.menu li {
                margin: 10px;
            }
        }

        .l1 {
            width: 50%;
            text-align: center;
            font-size: 28px;
            color: rgb(5, 5, 85);
            font-weight: 100;
            font-family: Georgia, 'Times New Roman', Times, serif;
            line-height: 90px;
        }

        .l2 {
            width: 50%;
            text-align: center;
        }

        .l3 {
            width: 50%;
            text-align: center;
        }

        .d1 {
            display: flex;
            padding: 25px;

        }

        .img1 {
            margin-top: 30px;
            border-radius: 50px;
        }

        .con1 {
            font-size: 23px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 20px;
            line-height: 50px;
        }

        .d2 {
            margin: 25px 25px 25px 180px;
        }

        .line {
            height: 5px;
            background-color: black;
            text-align: center;
            justify-content: center;
            align-items: center;
            width: 50px;
            margin: auto;
        }

        .d3 {
            font-size: 28px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 10px;

            display: flex;
        }

        .d3 h1 {
            text-align: center;
            color: rgb(5, 5, 85);
        }

        .objectives {
            font-size: 16px;
            margin: 58px 25px 25px 70px;
            line-height: 40px;
            width: auto;
        }



        .d4 {
            font-size: 28px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 10px;

        }

        .d5 {
            font-size: 28px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 10px;

        }

        .hero {
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            padding: 100px 0;
        }

        .hero h2 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .careers {
            padding: 50px 0;
            text-align: center;
        }

        .career {
            margin-bottom: 30px;
        }

        .career h3 {
            font-size: 2em;
            margin-bottom: 10px;
        }



        .img2 {
            margin-top: 54px;
            height: 350px;
            width: 420px;
        }

        .d4 p {
            font-size: 17px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .d4 h1 {
            font-size: 2.5rem;
            padding-top: 0px;
            color: #c35757;
            text-shadow: 6px 6px 4px #fae32f;
        }

        .d5 p {
            font-size: 17px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .d5 h1 {
            font-size: 2.5rem;
            padding-top: 0px;
            color: #c35757;
            text-shadow: 6px 6px 4px #fae32f;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        footer p {
            margin: 0;
        }
        .dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: black;
    font-weight: 500;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit; /* Important for vertical align on mobile phones */
    margin: 0; /* Important for vertical align on mobile phones */
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  /* Links inside the dropdown */
  .dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }
  
  /* Add a grey background color to dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #ddd;
  }
  
  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }
  
    </style>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Navigation Bar</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <nav>
            <div class="logo">Alumni Nexus</div>

            <label for="menu-toggle" class="menu-icon">&#9776;</label>
            <ul class="menu">
                <div class="dropdown">
                    <button class="dropbtn" id="profiletog" style="color: #fff;transition: color 0.3s;
                    font-size: 22px;
                    margin: 5px;
                    line-height: 50px;">Profile
                    </button>
                    <div class="dropdown-content">
                      <a href="profile.php">View progile</a>
                      <a href="profile.php">Edit profile</a>
                      <a href="login.php">Log out</a>
                    </div>
                  </div>
                <li><a href="#home"> Home</a></li>
                <li><a href="anet.html">Carrier Network</a></li>
                <li><a href="alres.html"> Resource sharing</a></li>
                <li><a href="chat.php">Chat with alumni</a></li>
                <li><a href="aljob.html"> Jobs</a></li>
                <li><a href="alpost.html">Posts</a></li>
                <li><a href="alnot.html">Notifications</a></li>
            </ul>
        </nav>
        <div class="d1">
            <div class="l1">
                <h1>Corporate Alumni <br> Management - Building <br> Lifelong Relationships <br> for Mutual Success</h1>
            </div>
            <div class="l2">
                <img src="getal.jpg" height="300px" width="500px" class="img1">
            </div>
        </div>

        <div class="d2">
            <p class="con1">
                Discover the world of corporate alumni management with this comprehensive overview <br>encompassing
                alumni program ideas, case studies showcasing successful alumni networks,<br> challenges faced,
                essential tools, and future trends.
            </p>
        </div>

        <div class="line"></div>
        <br>
        <br>
        <h1 style="<h1 style=text-align: left;margin-left:200px; font-size:38px; margin-bottom:-52px;">Objectives:</h1>

        <div class="d3">

            <div class="l3">
                <img src="oalum.jpg" class="img2">
            </div>
            <ul class="objectives">
                <li>To foster continuous engagement of the alumni with their alma mater.</li>
                <li>To promote a goodwill and sense of pride to both alumni and Alma Mater. </li>
                <li>The alumni contribute immensely to the development of the student community by providing them
                    industry
                    interface and guiding and empowering them through regular interactions in the form of lecture
                    series,
                    mock interviews, soft skill training, internships, placements etc</li>
                <li>To strengthen a lifelong relationship between the university and its alumni through various cultural
                    and
                    social Initiatives.</li>
                <li>To establish an external support from alumni in course designing on the basis of scope and market
                    trend,
                    promoting entrepreneurship, industrial research, training program for students etc.</li>
                <li>To encourage and build the sense of belongingness among the members of the alumni.</li>
                <li>To Promote and encourage academic; professional, and social activities that concern Alumni. </li>
            </ul>
        </div>
        <br>
        <div class="line"></div>
        <br>
        <div class="d4">
            <h1> => What is Alumni management system?</h1>
            <p class="con1"> -> An alumni management system is a software platform designed to facilitate communication
                and engagement
                among
                alumni of an institution. It typically includes features such as alumni directory, event management,
                fundraising tools, and job postings. These systems help organizations maintain connections with former
                students, fostering a sense of community and support. Alumni can update their contact information,
                connect
                with fellow graduates, and stay informed about upcoming events or opportunities. Institutions use these
                systems to track alumni involvement, gather feedback, and measure the impact of alumni relations
                efforts.
                Advanced systems may integrate with social media platforms and offer analytics to optimize engagement
                strategies. Overall, alumni management systems serve as a vital tool for nurturing relationships between
                alumni and their alma mater.</p>

        </div>
        <br>
        <div class="line"></div>
        <br>
        <div class="d5">
            <h1> => Why use Alumni management System?</h1>
            <p class="con1"> 1. An alumni management system helps organizations stay connected with their former
                students or members.<br>
                2. It facilitates communication and networking opportunities among alumni, fostering a sense of
                community.<br>
                3. The system can streamline event planning and coordination, making it easier to organize reunions,
                networking events, and fundraising activities.<br>
                4. Alumni can update their contact information and professional details, keeping the database current
                and
                accurate.<br>
                5. It allows for targeted communication, enabling organizations to send relevant updates, newsletters,
                and
                job opportunities to specific groups of alumni.<br>
                6. The system can track alumni engagement metrics, providing valuable insights into which initiatives
                are
                most effective at keeping alumni involved.<br>
                7. Alumni can use the platform to mentor current students or offer career advice, fostering a sense of
                mentorship and support within the community.<br>
                8. It serves as a valuable fundraising tool, allowing organizations to solicit donations and track donor
                contributions.<br>
                9. The system can help identify potential volunteers or leaders within the alumni community,
                facilitating
                recruitment for various initiatives or committees.<br>
                10. Overall, an alumni management system helps organizations maintain strong relationships with their
                alumni, benefiting both the institution and its graduates in the long run.<br>
            </p>

        </div>
        <div class="line"></div>
        <section class="hero">
            <div class="container">
                <h2>Career Guidance in Engineering</h2>
                <p>Explore various career paths in the field of engineering.</p>
            </div>
        </section>

        <section class="careers" id="carrirnetwork">
            <div class="container">
                <h2>Engineering Career Paths :</h2><br><br>
                <div class="career">
                    <h3>Software Engineering</h3>
                    <p>Software engineers design, develop, and maintain software systems.</p><br>
                    <b>Language learning:</b> <br>
                    JavaScript, Python, Java, C#, C++, Swift, Kotlin, PHP, Ruby, Go (Golang), SQL, R, TypeScript,
                    Perl.
                    <br><br>
                    <b>Future Technology:</b> <br>
                    Artificial Intelligence (AI), Internet of Things (IoT), 5G Technology, Edge Computing,
                    Blockchain,
                    Quantum Computing, Biotechnology, Renewable Energy, Augmented Reality (AR), Virtual Reality
                    (VR),
                    Cybersecurity.

                </div>
                <div class="career">
                    <h3>Mechanical Engineering</h3>
                    <p>Mechanical engineers design, develop, and test mechanical devices.</p><br>
                    Automotive Engineering, Aerospace Engineering, Energy Systems Engineering, Manufacturing
                    Engineering, Mechatronics Engineering, HVAC Engineering, Material Science and Engineering,
                    Product
                    Design and Development, Research and Development (R&D), Consulting and Project Management,
                    Biomedical
                    Engineering, Defense and Security Engineering.

                </div>
                <div class="career">
                    <h3>Civil Engineering</h3>
                    <p>Civil engineers design and oversee the construction of infrastructure projects.</p><br>

                    Structural Engineering, Transportation Engineering, Geotechnical Engineering, Environmental
                    Engineering, Water Resources Engineering, Construction Management, Urban Planning and
                    Development,
                    Coastal Engineering, Surveying and Mapping, Land Development Engineering.

                </div>

                <div class="career">
                    <h3>Electrical and Communication Engineering</h3>
                    <p>Electronics and Communication Engineering involves designing, developing, and maintaining
                        electronic
                        devices and communication systems for various industries.</p><br>

                    Analog Electronics, Digital Electronics, Microelectronics, VLSI Design (Very Large Scale
                    Integration),
                    Embedded Systems, Wireless Communication, Optical Communication, Networking, RF (Radio
                    Frequency)
                    Engineering, Antenna Design.

                </div>

                <div class="career">
                    <h3>Electrical Engineering</h3>
                    <p>Electrical engineering involves designing, developing, and maintaining electronic devices and
                        communication systems for various industries.</p><br>

                    Power Systems Engineering, Electronics Engineering, Control Systems Engineering, Signal
                    Processing,
                    Telecommunications Engineering, Integrated Circuit Design, Renewable Energy Systems, Robotics
                    and
                    Automation.

                </div>

            </div>
        </section>



        <footer>
            <div class="container">
                <p>&copy; 2024 Alumni Nexus. All rights reserved.</p>
            </div>
        </footer>

    </body>

    </html>

</body>

</html>