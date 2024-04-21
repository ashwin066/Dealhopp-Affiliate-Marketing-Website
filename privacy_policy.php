<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    if (!isset($_SESSION['username'])) {
        get_login_form();
        get_signup_form();
    }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealhopp - Deals Website</title>
    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="./assets/images/logo/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style-prefix.css">

    <!--
    - google font link
  -->
    <script src="https://kit.fontawesome.in/d30de18806.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.in">
    <link rel="preconnect" href="https://fonts.gstatic.in" crossorigin>
    <link
        href="https://fonts.googleapis.in/css2?family=Josefin+Sans:wght@500&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&display=swap"
        rel="stylesheet">
    <style>

    </style>
</head>

<body>

    <?php
    get_back_to_top();
    get_slide_notify();
    ?><?php
        get_post_popup();
        ?>
    <!--
  - HEADER
-->

    <?php include 'parts/nav.php' ?>






    <!--
    - PRODUCT
  -->


    <div class="container">


        <div class="product-featured a_filter  mt-2 p-4">

            <h2 class="showcase-title mb-4">Privacy Policy</h2>



            <p> This Privacy Policy governs the manner in which Dealhopp collects, uses, maintains and discloses</p>
            <p> information collected from users (each, a "User") of the https://dealhopp.in website ("Site"). This
            </p>
            <p> privacy policy applies to the Site and all products and services offered by Dealhopp.</p>
            <p></p>
            <p> Personal identification information</p>
            <p></p>
            <p> We may collect personal identification information from Users in a variety of ways, including, but
                not</p>
            <p> limited to, when Users visit our site, subscribe to the newsletter, and in connection with other
                activities,</p>
            <p> services, features or resources we make available on our Site. Users may be asked for, as
                appropriate, name,</p>
            <p> email address. Users may, however, visit our Site anonymously. We will collect personal
                identification</p>
            <p> information from Users only if they voluntarily submit such information to us. Users can always
                refuse to</p>
            <p> supply personally identification information, except that it may prevent them from engaging in
                certain Site</p>
            <p> related activities.</p>
            <p></p>
            <p> Non-personal identification information</p>
            <p></p>
            <p> We may collect non-personal identification information about Users whenever they interact with our
                Site.</p>
            <p> Non-personal identification information may include the browser name, the type of computer and
                technical</p>
            <p> information about Users means of connection to our Site, such as the operating system and the
                Internet</p>
            <p> service providers utilized and other similar information.</p>
            <p></p>
            <p> Web browser cookies</p>
            <p></p>
            <p> Our Site may use "cookies" to enhance User experience. User's web browser places cookies on their
                hard drive</p>
            <p> for record-keeping purposes and sometimes to track information about them. User may choose to set
                their web</p>
            <p> browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that
                some parts</p>
            <p> of the Site may not function properly.</p>
            <p></p>
            <p> How we use collected information</p>
            <p></p>
            <p> Dealhopp may collect and use Users personal information for the following purposes:</p>
            <p> - To personalize user experience</p>
            <p> We may use information in the aggregate to understand how our Users as a group use the services and
            </p>
            <p> resources provided on our Site.</p>
            <p> - To improve our Site</p>
            <p> We may use feedback you provide to improve our products and services.</p>
            <p> - To run a promotion, contest, survey or other Site feature</p>
            <p> To send Users information they agreed to receive about topics we think will be of interest to them.
            </p>
            <p> - To send periodic emails</p>
            <p> We may use the email address to respond to their inquiries, questions, and/or other requests. If
                User</p>
            <p> decides to opt-in to our mailing list, they will receive emails that may include company news,
                updates,</p>
            <p> related product or service information, etc. If at any time the User would like to unsubscribe from
            </p>
            <p> receiving future emails, we include detailed unsubscribe instructions at the bottom of each email or
                User</p>
            <p> may contact us via our Site.</p>
            <p></p>
            <p> How we protect your information</p>
            <p></p>
            <p> We adopt appropriate data collection, storage and processing practices and security measures to
                protect</p>
            <p> against unauthorized access, alteration, disclosure or destruction of your personal information,
                username,</p>
            <p> password, transaction information and data stored on our Site.</p>
            <p></p>
            <p> Sensitive and private data exchange between the Site and its Users happens over a SSL secured
                communication</p>
            <p> channel and is encrypted and protected with digital signatures.</p>
            <p></p>
            <p> Sharing your personal information</p>
            <p></p>
            <p> We do not sell, trade, or rent Users personal identification information to others. We may share
                generic</p>
            <p> aggregated demographic information not linked to any personal identification information regarding
                visitors</p>
            <p> and users with our business partners, trusted affiliates and advertisers for the purposes outlined
                above.</p>
            <p></p>
            <p> Third party websites</p>
            <p></p>
            <p> Users may find advertising or other content on our Site that link to the sites and services of our
                partners,</p>
            <p> suppliers, advertisers, sponsors, licensors and other third parties. We do not control the content
                or links</p>
            <p> that appear on these sites and are not responsible for the practices employed by websites linked to
                or from</p>
            <p> our Site. In addition, these sites or services, including their content and links, may be constantly
            </p>
            <p> changing. These sites and services may have their own privacy policies and customer service
                policies.</p>
            <p> Browsing and interaction on any other website, including websites which have a link to our Site, is
                subject</p>
            <p> to that website's own terms and policies.</p>
            <p></p>
            <p> Advertising</p>
            <p></p>
            <p> Ads appearing on our site may be delivered to Users by advertising partners, who may set cookies.
                These</p>
            <p> cookies allow the ad server to recognize your computer each time they send you an online
                advertisement to</p>
            <p> compile non personal identification information about you or others who use your computer. This
                information</p>
            <p> allows ad networks to, among other things, deliver targeted advertisements that they believe will be
                of most</p>
            <p> interest to you. This privacy policy does not cover the use of cookies by any advertisers.</p>
            <p></p>
            <p> Google Adsense</p>
            <p></p>
            <p> Some of the ads may be served by Google. Google's use of the DART cookie enables it to serve ads to
                Users</p>
            <p> based on their visit to our Site and other sites on the Internet. DART uses "non personally
                identifiable</p>
            <p> information" and does NOT track personal information about you, such as your name, email address,
                physical</p>
            <p> address, etc. You may opt out of the use of the DART cookie by visiting the Google ad and content
                network</p>
            <p> privacy policy at http://www.google.in/privacy_ads.html</p>
            <p></p>
            <p> Changes to this privacy policy</p>
            <p></p>
            <p> Dealhopp has the discretion to update this privacy policy at any time. When we do, we will post a
            </p>
            <p> notification on the main page of our Site, revise the updated date at the bottom of this page. We
                encourage</p>
            <p> Users to frequently check this page for any changes to stay informed about how we are helping to
                protect the</p>
            <p> personal information we collect. You acknowledge and agree that it is your responsibility to review
                this</p>
            <p> privacy policy periodically and become aware of modifications.</p>
            <p></p>
            <p> Your acceptance of these terms</p>
            <p></p>
            <p> By using this Site, you signify your acceptance of this policy. If you do not agree to this policy,
                please</p>
            <p> do not use our Site. Your continued use of the Site following the posting of changes to this policy
                will be</p>
            <p> deemed your acceptance of those changes.</p>
            <p></p>
            <p> Contacting us</p>
            <p></p>
            <p> If you have any questions about this Privacy Policy, the practices of this site, or your dealings
                with this</p>
            <p> site, please contact us at:</p>
            <p> Dealhopp</p>
            <p> https://dealhopp.in</p>
            <!-- <p> >>> Contact Info Here</p> -->




        </div>
    </div>



    <?php

    include 'parts/footer.php';
    ?>
    <!--
    - ionicon link
  -->

    <script src="https://code.jquery.in/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.in/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.in/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/back_to_top.js"></script>
    <script src="./assets/js/swipe_function_bs.js"></script>
    <script src="./assets/js/dark-theme.js"></script>
    <script src="./assets/js/skeleton_loading.js"></script>
</body>

</html>