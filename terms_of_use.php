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
    <script src="https://kit.fontawesome.com/d30de18806.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&display=swap"
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

            <h2 class="showcase-title mb-4">Terms of use</h2>



            <p> Welcome to Dealhopp.in.</p>
            <p> These Terms of Service (the “Terms“) are a binding legal agreement between you and Dealhopp.in</p>
            <p> (“Dealhopp.in” or “we”, “us”, “our”, “Dealhopp“), regarding your use of the Dealhopp.in website</p>
            <p> and services at Dealhopp.in and other websites owned and operated by Dealhopp.in to the extent</p>
            <p> applicable (the website and services are collectively referred to as the “Service“). Please read
                this</p>
            <p> Agreement carefully.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> We may periodically make changes to these Terms. By accessing or using the Service, you accept this
            </p>
            <p> Agreement and any modifications that we may make to the Agreement. It is your responsibility to
                review the</p>
            <p> most recent version of the Terms frequently and remain informed of any changes to it. If you do not
                agree to</p>
            <p> any provision of these Terms, you should not use the Service.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Please note: that Dealhopp.in/We Have financial relationships with some of the merchants listed on
                our</p>
            <p> website. Dealhopp.in may be compensated if consumers choose to utilize some of the links located</p>
            <p> throughout the content on this site and generate sales,Lead, Signup, Joining or any other Action on
                the</p>
            <p> merchant Platform. Read All Applicable Disclaimer, for use of dealhopp, here.</p>
            <p></p>
            <p> Copyright and Limited License</p>
            <p></p>
            <p></p>
            <p> The Service and all information, data, and other content and materials available on the Service,
                including,</p>
            <p> without limitation, the Dealhopp.in logo and all designs, text, documents, graphics, software,
                videos,</p>
            <p> sound files, other files, and the selection and arrangement thereof (collectively, “Content”), are
                the</p>
            <p> proprietary property of Dealhopp.in and its suppliers, licensors, Affiliate partners are protected
                by</p>
            <p> international copyright laws. Store logo and Brand Logo and Name Posted in our website is property
                of their</p>
            <p> respected owner.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> If you comply with all the terms and conditions of these Terms, Dealhopp.in grants you a limited,
            </p>
            <p> personal, revocable, non-transferable, and non-exclusive license to access the Service and to
                electronically</p>
            <p> copy (except where prohibited without a license) and print to hard copy portions of the Content for
                your</p>
            <p> personal, and non-commercial purposes only. The Service is for your personal use and not for resale
                or</p>
            <p> further distribution. This license is revocable at any time.</p>
            <p></p>
            <p> Except as otherwise explicitly provided in this Agreement or as may be expressly permitted by
                applicable</p>
            <p> law, you will not, and will not permit or authorize third parties to: (a) reproduce, modify,
                translate,</p>
            <p> enhance, decompile, disassemble, reverse engineer, or create derivative works of the Service; (b)
                rent,</p>
            <p> lease, or sublicense access to the Service; nor (c) circumvent or disable any security or
                technological</p>
            <p> features or measures of the Service.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> The Service</p>
            <p></p>
            <p></p>
            <p> We are a Marketing Agency that earns Revenue from Advertising & Affiliate Marketing. We are
                providing Deals,</p>
            <p> Offers and online coupons to our users on our Website, App, Social Media Pages & Other Communication
            </p>
            <p> Channels. We provide Deals, Offers and online coupons to our users. Dealhopp.in is not responsible
                for</p>
            <p> the redemption, errors, omissions, or expiration of online coupons and Offers. It is your
                responsibility to</p>
            <p> make sure that a discount, special pricing, or free offer is present in the checkout process at the
            </p>
            <p> applicable merchant website. All offers and promotions featured as a part of the Service are subject
                to</p>
            <p> change without notice and we have no control over the legality of any coupons or the ability of any
                merchant</p>
            <p> to complete the sale in accordance with the offers. user</p>
            <p></p>
            <p> Deals & Offer Posted on Site are for Information purpose only and the user making transaction should
            </p>
            <p> carefully read Information and Offer's Terms & Condition on Actual offer site/store before making
                any</p>
            <p> Transaction. Offer Posted here are just information and does not constitute any Legal contractual
                right for</p>
            <p> User and user cannot use the Same for Legal purpose.</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p> Account Registration</p>
            <p></p>
            <p></p>
            <p> You may register for and maintain an account to access additional features, such as voting on deals,
                posting</p>
            <p> comments, and submitting your coupon deals to the Service. When you register, you agree to (a)
                provide</p>
            <p> accurate, current and complete information about you as may be prompted by registration forms on the
                Service</p>
            <p> (“Registration Data”); (b) maintain the security of any logins, passwords, or other credentials that
                you</p>
            <p> select or that are provided to you for use on the Service; and (c) maintain and promptly update the
            </p>
            <p> Registration Data, and any other information you provide to Dealhopp.in, and to keep all such</p>
            <p> information accurate, current, and complete. You will notify us immediately of any unauthorized use
                of your</p>
            <p> account or any other breach of security.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Use Restrictions</p>
            <p></p>
            <p></p>
            <p> You will not: (a) use this Service for any commercial purpose; (b) access, monitor or copy any
                content or</p>
            <p> information on the Service using any robot, spider, scraper or other automated means or any manual
                process</p>
            <p> for any purpose without our express written permission; (c) violate the restrictions in any robot
                exclusion</p>
            <p> headers on the Service or bypass or circumvent other measures employed to prevent or limit access to
                the</p>
            <p> Service; (d) take any action that imposes, or may impose, in our discretion, an unreasonable or</p>
            <p> disproportionately large load on our infrastructure; (e) deep-link to any portion of the Service
                (including,</p>
            <p> without limitation, the direct link to a coupon) for any purpose without our express written
                permission; or</p>
            <p></p>
            <p> (f) “frame”, “mirror” or otherwise incorporate any part of the Service into any other website
                without our</p>
            <p> prior written authorization; or (g) intentionally or unintentionally violate any applicable local,
                state,</p>
            <p> national or international law or regulation.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Interactive Services</p>
            <p></p>
            <p></p>
            <p> The Service may include interactive features and services, including social networking
                functionality,</p>
            <p> forums, message boards, ratings or review functionality, and similar services, in which you or third
                parties</p>
            <p> may send messages to Service users, and create, post, or store coupons, profile data, pictures,
                ratings or</p>
            <p> reviews, and other Content on the Service (“Interactive Services”). You are solely responsible for
                your use</p>
            <p> of Interactive Services and use them at your own risk. By using any Interactive Services, you agree
                not to</p>
            <p> post, transmit, distribute, upload, or otherwise disseminate through the Service any of the
                following:</p>
            <p></p>
            <p></p>
            <p></p>
            <p> * Materials that are unlawful, libelous, defamatory, obscene, pornographic, indecent, lewd,
                suggestive,</p>
            <p> harassing, threatening, invasive of privacy or publicity rights, abusive, inflammatory, or
                fraudulent;</p>
            <p></p>
            <p> * Material that violates, or that causes Dealhopp.in or its affiliates or subsidiaries to violate,
                any</p>
            <p> applicable law, regulation, or order of any governmental authority in any jurisdiction;</p>
            <p></p>
            <p> * Material that infringes, or that may infringe, any patent, trademark, trade secret, copyright or
                other</p>
            <p> intellectual or proprietary right of any party, or that you otherwise do not have the right to make
            </p>
            <p> available;</p>
            <p></p>
            <p> * Private or confidential information of any person or entity, including, without limitation,
                addresses,</p>
            <p> phone numbers, email addresses, Social Security numbers, credit card numbers, and any trade secrets
                or</p>
            <p> information for which you have any obligation of confidentiality or material that impersonates any
                person or</p>
            <p> entity, or misrepresents your affiliation with the Service or with any other person or entity;</p>
            <p></p>
            <p> * Material that is or contains any advertising or solicitation, including, without limitation, links
                to</p>
            <p> commercial products or services or any political campaigning (except in portions of the Service that
                are</p>
            <p> expressly designated as portions in which such Material is allowed, such as the posting of coupons
                by</p>
            <p> non-commercial users);</p>
            <p></p>
            <p> * Comments that in any way refer to persons under 18 years of age;</p>
            <p></p>
            <p> * Personal data about any user;</p>
            <p></p>
            <p> * Viruses, corrupted data, or other harmful, disruptive, or destructive files; or</p>
            <p></p>
            <p> * Material that, in the sole judgment of Dealhopp.in, is objectionable, restricts or inhibits any
                person</p>
            <p> or entity from using or enjoying any Interactive Services or other portions of the Service, or which
                may</p>
            <p> expose Dealhopp.in or its users to harm or liability of any nature.</p>
            <p></p>
            <p> * Dealhopp.in takes no responsibility and assumes no liability for any material posted, stored, or
            </p>
            <p> uploaded by you or any third party, or for any loss or damage thereto. Although Dealhopp.in has no
            </p>
            <p> obligation to screen, edit, or monitor any material posted on or transmitted through the Service,
            </p>
            <p> Dealhopp.in reserves the right, and has absolute discretion, to remove, screen, and edit any
                material</p>
            <p> posted, stored, or transmitted on or through the Service at any time and for any reason without
                notice.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> If you post material on or through the Service, then, unless Dealhopp.in indicates otherwise, you
                (a)</p>
            <p> grant Dealhopp.in and its subsidiaries and affiliates a nonexclusive, royalty-free, perpetual,</p>
            <p> irrevocable, and fully sublicensable right to use, reproduce, modify, adapt, publish, translate,
                create</p>
            <p> derivative works from, distribute, perform, and display such material throughout the world in any
                media; (b)</p>
            <p> grant Dealhopp.in and its affiliates, subsidiaries, and sublicensees the right to use the name that
                you</p>
            <p> submit in connection with such material, if they choose; and (c) represent and warrant that you own
                and</p>
            <p> control all of the rights to the material that you post, or you otherwise have the right to post
                such</p>
            <p> material to the Service; and the use and posting of material you supply does not violate these
                Terms, will</p>
            <p> not violate any rights of or cause injury to any person or entity, and will not otherwise create any
                harm or</p>
            <p> liability of any type for Dealhopp.in or for third parties.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Submissions</p>
            <p></p>
            <p></p>
            <p> You acknowledge and agree that any materials, including but not limited to coupons, comments,
                suggestions,</p>
            <p> ideas, or other information, provided by you in the form of email or other submissions to
                Dealhopp.in</p>
            <p> (excluding material that you post on the Service in accordance with these Terms), are
                non-confidential and</p>
            <p> shall become the sole property of Dealhopp.in. Dealhopp.in will own exclusive rights, including all
            </p>
            <p> intellectual property rights, and shall be entitled to the unrestricted use and dissemination of
                these</p>
            <p> materials for any purpose, commercial or otherwise, without acknowledgment or compensation to you.
            </p>
            <p></p>
            <p></p>
            <p></p>
            <p> Repeat Infringer Policy</p>
            <p></p>
            <p></p>
            <p> In accordance with the Digital Millennium Copyright Act and other applicable law, Dealhopp.in
                maintains</p>
            <p> a policy of terminating, in appropriate circumstances and at Dealhopp.in’s sole discretion, account
            </p>
            <p> holders who are deemed to be repeat infringers. Dealhopp.in may also at its sole discretion limit
                access</p>
            <p> to the Service to any users and/or terminate the accounts of any account holders who infringe any
            </p>
            <p> intellectual property rights of others, whether or not there is any repeat infringement.</p>
            <p></p>
            <p> If you believe that any Content on the Service infringes upon any copyright that you own or control,
                you may</p>
            <p> file a notice of infringement with Dealhopp.in’s designated agent as set forth below.</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p> Dealhopp.in may give notice of a claim of copyright infringement to users of the Service by means of
                a</p>
            <p> general notice on the Service, electronic mail to a user’s email address in its records, or by
                written</p>
            <p> communication sent by first-class mail to a user’s address in its records.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Trademarks</p>
            <p></p>
            <p></p>
            <p> Dealhopp.in, the Dealhopp.in logo, and any other product or service name or slogan contained on the
            </p>
            <p> Service and in any Content are trademarks of Dealhopp.in and its suppliers or licensors, and may not
                be</p>
            <p> copied, imitated or used, in whole or in part, without the prior written permission of Dealhopp.in
                or</p>
            <p> the applicable trademark holder. All other trademarks, registered trademarks, product names and
                company</p>
            <p> names or logos mentioned on the Service or in any Content are the property of their respective
                owners.</p>
            <p> Reference to any products, services, processes or other information, by trade name, trademark,
                manufacturer,</p>
            <p> supplier or otherwise, does not constitute or imply endorsement, sponsorship, or recommendation
                thereof by</p>
            <p> Dealhopp.in.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Third-Party Content</p>
            <p></p>
            <p></p>
            <p> The Service may contain links to Web pages and content of third parties (“Third-Party Content”) as a
                service</p>
            <p> to those interested in this information. Dealhopp.in does not monitor, endorse, or adopt, or have
                any</p>
            <p> control over, any Third-Party Content. Dealhopp.in undertakes no responsibility to update or review
                any</p>
            <p> Third Party Content and can make no guarantee as to its accuracy or completeness.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Additionally, if you follow a link or otherwise navigate away from the Service, please be aware that
                these</p>
            <p> Terms will no longer govern. You should review the applicable terms and policies, including privacy
                and data</p>
            <p> gathering practices, of any Websites or Third-Party Content to which you navigate from the Service.
                You</p>
            <p> access and use Third-Party Content at your own risk.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> The Service may contain advertisements and promotions from third parties. Your business dealings or
            </p>
            <p> correspondence with, or participation in promotions of, advertisers other than Dealhopp.in, and any
            </p>
            <p> terms, conditions, warranties, or representations associated with such dealings, are solely between
                you and</p>
            <p> such third party.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> We may provide information via placing a banner on an image of a post which can be an opinion,
                suggestion,</p>
            <p> additional product information, relevant details or any other details. The information provided via
                banner,</p>
            <p> in any manner, does not create a contractual agreement between the user of the website and Dealhopp.
            </p>
            <p> Exclusive deals and coupons are property of dealhopp, no one is allowed to use it on their website.
            </p>
            <p></p>
            <p></p>
            <p></p>
            <p> Indemnification</p>
            <p></p>
            <p></p>
            <p> You will defend, indemnify and hold harmless Dealhopp.in, its subsidiaries and affiliates, and their
            </p>
            <p> respective directors, officers, agents, employees, licensors, and suppliers from and against any
                costs,</p>
            <p> damages, expenses, and liabilities (including, but not limited to, reasonable attorneys’ fees)
                arising out</p>
            <p> of or related to your use of the Service, your violation of these Terms, or your violation of any
                rights of</p>
            <p> a third party.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Disclaimer of Warranties</p>
            <p></p>
            <p></p>
            <p> YOUR USE OF THE SERVICE, INCLUDING, WITHOUT LIMITATION, YOUR USE OF ANY CONTENT ACCESSIBLE THROUGH
                THE</p>
            <p> WEBSITE AND YOUR INTERACTIONS AND DEALINGS WITH ANY SERVICE USERS, IS AT YOUR SOLE RISK. THE
                SERVICE, AND</p>
            <p> ALL CONTENT AVAILABLE ON AND THROUGH THE WEBSITE OR SERVICE ARE PROVIDED ON AN “AS IS” AND “AS
                AVAILABLE”</p>
            <p> BASIS. DEALHOPP.IN AND ITS SUPPLIERS AND LICENSORS EXPRESSLY DISCLAIM ALL WARRANTIES OF ANY KIND,
            </p>
            <p> WHETHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY,
                FITNESS</p>
            <p> FOR A PARTICULAR PURPOSE, TITLE, AND NON-INFRINGEMENT. DEALHOPP.IN DOES NOT WARRANT UNINTERRUPTED
                USE OR</p>
            <p> OPERATION OF THE SERVICE OR YOUR ACCESS TO ANY CONTENT. NO ADVICE OR INFORMATION, WHETHER ORAL OR
                WRITTEN,</p>
            <p> OBTAINED BY YOU FROM THE SERVICE WILL CREATE ANY WARRANTY REGARDING DEALHOPP.IN THAT IS NOT
                EXPRESSLY</p>
            <p> STATED IN THESE TERMS.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Limitation of Liability</p>
            <p></p>
            <p></p>
            <p> NEITHER DEALHOPP.IN NOR ITS SUPPLIERS OR LICENSORS WILL BE LIABLE FOR ANY INDIRECT, INCIDENTAL,
                SPECIAL,</p>
            <p> CONSEQUENTIAL, OR EXEMPLARY DAMAGES, INCLUDING, WITHOUT LIMITATION, DAMAGES FOR LOSS OF PROFITS,
                GOODWILL,</p>
            <p> USE, DATA, OR OTHER INTANGIBLE LOSSES (EVEN IF DEALHOPP.IN OR ANY SUPPLIER OR LICENSOR HAS BEEN
                ADVISED</p>
            <p> OF THE POSSIBILITY OF THESE DAMAGES), ARISING OUT OF OR RELATING TO YOUR ACCESS TO OR USE OF, OR
                YOUR</p>
            <p> INABILITY TO ACCESS OR USE, THE SERVICE OR ANY CONTENT.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> THE MAXIMUM TOTAL LIABILITY OF DEALHOPP.IN AND ITS SUPPLIERS AND LICENSORS TO YOU FOR ALL CLAIMS
                UNDER</p>
            <p> THESE TERMS, WHETHER IN CONTRACT, TORT, OR OTHERWISE, IS Rs.1000 (INR). EACH PROVISION OF THESE
                TERMS THAT</p>
            <p> PROVIDES FOR A LIMITATION OF LIABILITY, DISCLAIMER OF WARRANTIES, OR EXCLUSION OF DAMAGES IS TO
                ALLOCATE THE</p>
            <p> RISKS UNDER THESE TERMS BETWEEN THE PARTIES. THIS ALLOCATION IS AN ESSENTIAL ELEMENT OF THE BASIS OF
                THE</p>
            <p> BARGAIN BETWEEN THE PARTIES. EACH OF THESE PROVISIONS IS SEVERABLE AND INDEPENDENT OF ALL OTHER
                PROVISIONS</p>
            <p> OF THESE TERMS. THE LIMITATIONS IN THIS SECTION WILL APPLY EVEN IF ANY LIMITED REMEDY FAILS OF ITS
                ESSENTIAL</p>
            <p> PURPOSE.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Restrictions on Access</p>
            <p></p>
            <p></p>
            <p> Notwithstanding any provision of these Terms, Dealhopp.in reserves the right, without notice and in
                its</p>
            <p> sole discretion, to terminate your license to use the Service and to block, restrict, and prevent
                your</p>
            <p> future access to, and use of, the Service. Additionally, Dealhopp.in reserves the right to modify,
            </p>
            <p> discontinue, and restrict, temporarily or permanently, all or part of the Service without notice in
                its sole</p>
            <p> discretion. Neither Dealhopp.in nor its suppliers or licensors will be liable to you or to any third
            </p>
            <p> party for any modification, discontinuance, or restriction of the Service.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> Consent to Electronic Communications</p>
            <p></p>
            <p></p>
            <p> By using the Service, you consent to receiving electronic communications from Dealhopp.in. These</p>
            <p> communications may include notices about your account and information concerning or related to the
                Service.</p>
            <p> You agree that any notices, agreements, disclosures, or other communications that Dealhopp.in sends
                to</p>
            <p> you electronically will satisfy any legal communication requirements, including that such
                communications be</p>
            <p> in writing.</p>
            <p></p>
            <p></p>
            <p></p>
            <p> General Legal Notices</p>
            <p></p>
            <p></p>
            <p> Dealhopp.in’s failure to act in a particular circumstance does not waive its ability to act with
                respect</p>
            <p> to that circumstance or similar circumstances. Any provision of these Terms that is found to be
                invalid,</p>
            <p> unlawful, or unenforceable will be severed from these Terms, and the remaining provisions of these
                Terms</p>
            <p> will continue to be in full force and effect. The section headings and titles in these Terms are for
            </p>
            <p> convenience only and have no legal or contractual effect. Any provision in these Terms that by its
                nature</p>
            <p> should survive the termination of your license to access the Service or any termination of these
                Terms</p>
            <p> (including, without limitation, provisions governing indemnification, limitations on liability,
                disclaimers</p>
            <p> of warranty, and ownership of intellectual property) will continue to remain in full force and
                effect after</p>
            <p> any such termination.</p>
            <p></p>
            <p> These Terms constitute the entire agreement between you and Dealhopp.in concerning the Service.
                These</p>
            <p> Terms supersede all prior agreements or communications between you and Dealhopp.in regarding the
                subject</p>
            <p> matter of these Terms.</p>
            <p></p>




        </div>
    </div>
    <?php

    include 'parts/footer.php';
    ?>



    <!--
    - ionicon link
  -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/back_to_top.js"></script>
    <script src="./assets/js/swipe_function_bs.js"></script>
    <script src="./assets/js/dark-theme.js"></script>
    <script src="./assets/js/skeleton_loading.js"></script>
</body>

</html>