<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>COLLAB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/fav2.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">


  <link href="../assets/css/style1.css" rel="stylesheet">


  <style>
    h2{
  text-align:center;
  padding: 20px;
}
/* Slider */

.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
    </style>
</head>

<body>


<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top" style="background: #d4e6f3;color: black">
    <!--<div class="container d-flex">
      <div class="contact-info mr-auto" style="color: black">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">info@bewithcollab.com</a>
        <i class="icofont-phone"></i> +971 45 46 5938
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>

      </div>
    </div>   -->
</div>


<header id="header" class="fixed-top" style="background: #d4e6f3">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto">
            <!--<a href="index.html">Collab<span>.</span></a>-->
            <a href="<?php echo URL::to('/');?>"><img src="newlogo.png" height="80"></a>
        </h1>


        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#about">Objectives</a></li>

                <!--<li class="drop-down"><a href="">Drop Down</a>
                  <ul>
                    <li><a href="#">Drop Down 1</a></li>
                    <li class="drop-down"><a href="#">Deep Drop Down</a>
                      <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Drop Down 2</a></li>
                    <li><a href="#">Drop Down 3</a></li>
                    <li><a href="#">Drop Down 4</a></li>
                  </ul>
                </li>-->
                <li><a href="#contact">Contact</a></li>

                <li><a href="https://bewithcollab.com/support">Support</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

  <!-- ======= Hero Section ======= -->

  <section id="featured-services" style="padding-top:150px;" class="contact">

<div class="content">
    <div class="container">

        <div style="text-align:center">
            <img src="https://bewithcollab.com/assets/img/logo1.jpg"  alt="alt-text" />
            <p style="text-align: justify;"><h4 class="title">Privacy Policy</h4></p>
        </div>

        <p style="text-align: justify">
            This privacy policy informs you about the nature, scope, and purpose of the processing of personal data (hereinafter referred to as "data") in the context of the provision of our website at www.bewithcollab.com and iOS and Android mobile applications (hereinafter collectively referred to as "online offer").
        </p> <p style="text-align: justify">We attach great importance to the security of your data and compliance with applicable data protection regulations. The collection, processing and use of personal data is subject to the provisions of the Federal Decree-Law No. 45 of 2021 regarding personal data protection (the Data Protection Law) and the General Data Protection Regulation (GDPR).
        </p>   <p style="text-align: justify">
        <p style="text-align: justify;"> <b>Responsible party</b> </p>
        <p style="text-align: justify;"><h4><b>Collab Portal  </b></h4>    </p>
            <p style="text-align: justify;">Almas Tower,Jumeirah Lakes Towers

            </p>
        <p style="text-align: justify;"> PO. Box 48800,Dubai, United Arab Emirates </p>
        </p>   <p style="text-align: justify">
            <p style="text-align: justify;">Web: <a href="https://bewithcollab.com/">www.bewithcollab.com</a>
            </p><p style="text-align: justify;">E-mail: <a href="info@bewithcollab.com">info@bewithcollab.com</a>
        </p><p style="text-align: justify;">Tel: +971 4546 59 38     </p>

        </p>
        <p style="text-align: justify;">
            <b>Accuracy </b><p style="text-align: justify;">
            It is important that the data we hold about you is accurate and current, therefore please keep us informed of any changes to your personal data.

        </p><b>What are the categories of data subjects? </b><p style="text-align: justify;">
            Customers, interested parties, visitors, and users of the online offer, business partners. Visitors and users of the online offer. In the following, we refer to the data subjects collectively as "users".

        </p><p style="text-align: justify;"><b>What are the purposes for processing? </b>
            <ul>
            <li>Provision of the website and app, its contents and functions.
            </li><li>Provision of contractual services, service and customer care.
            </li><li>Answering contact enquiries and communication with users.
            </li><li>Marketing, advertising and market research.
            </li><li>Security measures.</li>
        </ul>
        </p><p style="text-align: justify;"><b>What are the relevant legal bases for processing your data? </b>
            The following informs you about the legal basis of us processing your data and unless the legal basis is not specifically mentioned, the following applies:
              <ul>
            <li>Consent – This is where we have asked you to provide explicit permission to process your data for a particular purpose.
        </li><li>Contract – This is where we process your information to fulfil a contractual arrangement, we have made with you.
        </li><li>Answering your business enquiries – This is where we process your information to reply to your messages, e-mails, posts, calls, etc.
        </li><li>Legitimate Interests - This is where we rely on our interests as a reason for processing, generally this is to provide you with the best products and service in the most secure and appropriate way. Of course, before relying on any of those legitimate interests we balance them against your interests and make sure they are compelling enough and will not cause any unwarranted harm.
        <li>Legal Obligation – This is where we have a statutory or other legal obligation to process the information, such as for the investigation of crime.
            </li></ul>
        </p><p style="text-align: justify;"><b>Data Protection Principles  </b>
            All personal data must be:
             <ul>
            <li>processed lawfully, fairly and in a transparent manner in relation to the data subject;
            </li><li>collected for specified, explicit and legitimate purposes and not further processed in a manner that is incompatible with those purposes; further processing for archiving purposes in the public interest, scientific or historical research purposes or statistical purposes shall not be considered to be incompatible with the initial purposes subject to appropriate safeguards, and provided that there is no risk of breaching the privacy of the data subject.
            </li><li>adequate, relevant and limited to what is necessary in relation to the purposes for which it is processed;
            </li><li>accurate and where necessary, kept up to date; every reasonable step must be taken to ensure that personal data that is inaccurate, having regard to the purposes for which they are processed, is erased or rectified without delay;
            </li><li>kept in a form which permits identification of data subjects for no longer than necessary for the purposes for which the personal data is processed; personal data may be stored for longer periods insofar as the personal data will be processed solely for archiving purposes in the public interest, scientific or historical research purposes or statistical purposes subject to implementation of the appropriate technical and organisational measures required by the Regulation in order to safeguard the rights and freedoms of the data subject;
        <li>processed in a manner that ensures appropriate security of the personal data, including protection against unauthorised or unlawful processing and against accidental loss, destruction or damage, using appropriate technical or organisational measures;
            </li></ul>
        </p><p style="text-align: justify;"><b>What are your rights? </b>
            You have the following rights with respect to us processing your personal data:
             <ul>
            <li>Right of access
                You have the right to obtain information about whether and which of your personal data is processed by us. In this case, we will also inform you about:
            </li><li>the purpose of processing;
            </li><li>the categories of data;
            </li><li>the recipients of your personal data;
            </li><li>the planned storage period or the criteria for the planned storage period;

            </li><li>Right to rectification
                You have a right to rectification and/or completion if your personal data processed by us is inaccurate or incomplete.

            </li><li>Right to restriction of processing
                You have a right to restriction of processing, provided that:
            </li><li>we verify the accuracy of your personal data processed by us;
            </li><li>the processing of your personal data is unlawful;
            </li><li>you need your personal data processed by us for legal prosecution after the purpose has ceased to exist;
            </li><li>you have objected to the processing of your personal data and we are reviewing this objection.

            </li><li>Right to erasure
                You have a right to erasure if:
            </li><li>we no longer need your personal data for its original purpose;
            </li><li>you withdraw your consent and there is no further legal basis for processing your personal data;
            </li><li>you object to the processing of your personal data and - unless it is direct marketing - there are no overriding reasons for further processing;
            </li><li>the processing of your personal data is unlawful;
            </li><li>the erasure of your personal data is required by law; and
            </li><li>your personal data was collected as a minor for information society services.

            </li><li>Right to information
                If you have exercised your right to rectification, erasure or restriction of processing, we will inform all recipients of your personal data, of this rectification, erasure of data or restriction of processing.

            </li><li>Right to data portability
                You have a right to receive your personal data processed by us on the basis of consent or for the performance of a contract in a structured, common and machine-readable format and to transfer it to another controller. If technically feasible, you have the right to have us transfer this data directly to another controller.

            </li><li>Right to object
                You have the right to object to the processing of your personal data in case of special reasons. In this case, we will no longer process your personal data unless we can demonstrate compelling legitimate grounds for the processing. In case of processing of your personal data for direct marketing purposes, you have the right to object at any time.

            </li><li>Right of withdrawal
                You have the right to revoke any consent given to us at any time. The revocation of consent does not affect the lawfulness of the processing carried out on the basis of the consent until the revocation.

            </li><li>Right to complain to a supervisory authority
            </li></ul>
            Without prejudice to any other administrative or judicial remedy, you have the right to lodge a complaint with the competent supervisory authority if you believe that the processing of your personal data by us violates the law.

        </p><p style="text-align: justify;"><b> Types of data processed   </b>
            <ul>
            <li>Inventory data (e.g., business name, personal master data, names, or addresses).
            </li><li>Contact data (e.g., e-mail, telephone numbers).
            </li><li>Access data (e.g., Username, Password).
            </li><li>Content data (e.g., text input, Profile picture, shared live feeds, attachments in chat).
            </li><li>Usage data (e.g., web sites visited, interest in content, access times).
            </li><li>Payment Data (e.g., when you pay for services).
            </li><li>Meta/communication data (e.g., device information, Location data, IP addresses).
            </li></ul>
        <p style="text-align: justify;"><b>Categories of data subjects </b>
            Visitors and users of the online offer (Hereafter, we also refer to the data subjects collectively as "users").
            How we use information
            The main reason we use your information is to provide and improve our services. We also use your information to protect you and to provide you with advertisements that may be of interest to you.
               <ul>
            <li>to provide our services to you;
            </li><li>to provide you with customer support and respond to your inquiries;
            </li><li>to complete your transactions;
            </li><li>to communicate with you about our services;
            </li><li>to improve our services and develop new services;
            </li><li>to conduct research and analysis of user behaviour to improve our services and content (e.g., we may decide to change the look and feel or even substantially modify a particular feature based on user behaviour);
            </li><li>to develop new features and services;
            </li><li>to prevent, detect and respond to fraud or other illegal or unauthorised activities;
            </li><li>to address ongoing or perceived misconduct;
            </li><li>to perform data analysis to better understand these activities and develop countermeasures;
            </li><li>to retain data related to fraudulent activity to prevent recurrence;
            </li><li>to ensure compliance with laws;
            </li><li>to comply with legal requirements;
            </li><li>to assist law enforcement; and
            </li><li>to enforce or exercise our rights. </li>
        </ul>
        </p><p style="text-align: justify;"><b> Security measures  </b>
            <p style="text-align: justify;">We take appropriate technical and organizational measures in accordance with the legal requirements, taking into account the state of the art, the implementation costs and the nature, scope, circumstances and purposes of the processing, as well as the varying likelihood and severity of the risk to the rights and freedoms of natural persons, in order to ensure a level of protection appropriate to the risk.

        </p><p style="text-align: justify;"> The measures include, in particular, ensuring the confidentiality, integrity and availability of data by controlling physical access to the data, as well as access to, input, disclosure, ensuring availability and segregation of the data. We also have procedures in place to ensure the exercise of data subjects' rights, deletion of data and response to data compromise. Furthermore, we already take the protection of personal data into account in the development and selection of hardware, software, and procedures, in accordance with the principle of data protection through technology design and through data protection-friendly default settings.

        </p><p style="text-align: justify;">For security reasons and to protect the transmission of confidential content that you send to us as the provider, this online offer uses TLS encryption (Transport Layer Security), or better known as SSL (Secure Sockets Layer), which is now obsolete. You can recognise the secure, encrypted connection to this online offer by the identifier https:// of the entry in the URL line (address line) of the browser used and/or the green lock symbol. HTTPS stands for Hypertext Transfer Protocol Secure.

        </p><p style="text-align: justify;"> We would like to point out that data transmission on the Internet (e.g., when communicating by e-mail) can have security gaps. Complete protection of data against access by third parties is not possible.

        </p><p style="text-align: justify;"><b> Cooperation with processors, joint controllers and third parties  </b>
        </p><p style="text-align: justify;">If, in the course of our processing, we disclose data to other persons and companies (order processors, jointly responsible persons or third parties), transfer it to them or otherwise grant them access to the data, this will only be done on the basis of legal permission (e.g. if a transfer of the data to third parties, such as to payment service providers, is necessary for the performance of the contract), users have consented, a legal obligation provides for this or on the basis of our legitimate interests (e.g. when using agents, web hosts, etc.).

        </p><p style="text-align: justify;"> If we disclose or transfer data to other companies in our group of companies or otherwise grant them access, this is done in particular for administrative purposes as a legitimate interest and, in addition, on a basis that complies with the legal requirements.

        </p><p style="text-align: justify;"><b>Transfers to third countries  </b>
        </p><p style="text-align: justify;"> If we process data in a third country (i.e., outside the UAE) or do so in the context of using third-party services or disclosing or transferring data to other persons or companies, this will only be done if it is done to fulfil our (pre-)contractual obligations, on the basis of your consent, due to a legal obligation or on the basis of our legitimate interests. Subject to legal or contractual permissions, we will only process or allow data to be processed in a third country if the legal requirements are met. This means, for example, that the processing is carried out on the basis of special guarantees, such as the officially recognised determination of a level of data protection or compliance with officially recognised special contractual obligations.

        </p><p style="text-align: justify;"><b>Deletion of data </b>
        </p><p style="text-align: justify;">The data processed by us will be deleted or restricted in its processing in accordance with the legal requirements. Unless expressly stated in this privacy policy, the data stored by us will be deleted as soon as it is no longer required for its intended purpose and the deletion does not conflict with any statutory retention obligations.

        </p><p style="text-align: justify;"> If the data is not deleted because it is required for other and legally permissible purposes, its processing will be restricted. I.e., the data is blocked and not processed for other purposes. This applies, for example, to data that must be retained for reasons of commercial or tax law.

        </p><p style="text-align: justify;"> Data processing in relation to our services
        </p><p style="text-align: justify;"><b> Commercial and business services</b>
            We process data of our contractual and business partners, e.g., customers and interested parties in the context of contractual and comparable legal relationships as well as related measures and in the context of communication with contractual partners (or pre-contractual), e.g., to answer enquiries.

        </p><p style="text-align: justify;">We process this data to fulfil our contractual obligations, to secure our rights and for the purposes of the administrative tasks associated with this information as well as for business organisation. We only disclose the data of the contractual partners to third parties within the scope of the applicable law to the extent that this is necessary for the aforementioned purposes or for the fulfilment of legal obligations or with the consent of the contractual partners (e.g., to participating telecommunications, transport, and other auxiliary services as well as subcontractors, banks, tax and legal advisers, payment service providers or tax authorities).

        </p><p style="text-align: justify;">  Unless otherwise specified the purposes of processing are Contractual performance and service, contact requests and communication, office and organisational procedures, administration, and response to requests, visit action evaluation, interest-based and behavioural marketing. And, the Legal bases are Contractual performance and pre-contractual inquiries, Legal obligation, and our Legitimate interests.

        </p><p style="text-align: justify;"><b>Technical services </b>
            We process the data of our customers and Customers in order to enable them to select, purchase or commission the selected services or works. The required information is identified as such in the context of the order, purchase order or comparable contract conclusion and includes the information required for the provision of services and billing as well as contact information.

        </p><p style="text-align: justify;">  Unless otherwise specified the purposes of processing are Contractual performance and service, contact requests and communication, office and organisational procedures, administration, and response to requests, visit action evaluation, interest-based and behavioural marketing. And, the Legal bases are Contractual performance and pre-contractual inquiries, Legal obligation, and our Legitimate interests.

        </p><p style="text-align: justify;"><b> Administration, financial accounting, office organisation, contact management </b>
            We process data in the context of administrative tasks as well as organisation of our operations, financial accounting and compliance with legal obligations, such as archiving. In this regard, we process the same data that we process in the course of providing our contractual services. The purpose and our interest in the processing lies in the administration, financial accounting, office organisation, archiving of data, i.e., tasks that serve the maintenance of our business activities, performance of our tasks and provision of our services. The deletion of data with regard to contractual services and contractual communication corresponds to the data mentioned in these processing activities.

        </p><p style="text-align: justify;">  In this context, we disclose or transfer data to consultants, such as legal advisors or auditors, as well as other fee offices and payment service providers.

        </p><p style="text-align: justify;"> Furthermore, based on our business interests, we store information on suppliers, event organisers and other business partners, e.g., for the purpose of contacting them at a later date. This data, most of which is company-related, is generally stored permanently.

        </p><p style="text-align: justify;"><b> Data transfer to payment service providers </b>
            In order to fulfil the contract, we pass on your data to the company commissioned with the payment, insofar as this is necessary for the payment of our services. Depending on which payment method you select, we pass on the payment data collected for this purpose to the credit institution commissioned with the payment and, if applicable, to payment service providers commissioned by us or to the selected payment service provider. In some cases, the selected payment service providers also collect this data themselves. In this case, the privacy policy of the respective payment service provider applies. The legal basis for the data processing is contract.

        </p><p style="text-align: justify;">  The data processed by the payment services include the payment data mentioned above. The information is necessary to carry out the transactions. However, the customer data entered is only processed by the payment service providers and stored by them. Furthermore, we cannot exclude that data of the payment service provider is transmitted to credit agencies. In this regard, we refer to the terms and conditions and privacy policies of the respective payment service providers.

        </p><p style="text-align: justify;">   If there is an obligation to transmit your payment data to us (e.g., account number in the case of direct debit authorisation) after the conclusion of a fee-based contract, this data is required for payment processing.

        </p><p style="text-align: justify;">  Payment transactions via the common means of payment are made exclusively via an encrypted SSL or TLS connection. You can recognise an encrypted connection by the fact that the address line of the browser changes from "http://" to "https://" and by the lock symbol in your browser line.

        </p><p style="text-align: justify;">  With encrypted communication, your payment data that you transmit to us cannot be read by third parties.

        </p><p style="text-align: justify;"> Data processing for the purpose of fraud prevention and optimisation of our payment processes
        </p><p style="text-align: justify;">   Where applicable, we provide our service providers with further data, which they use together with the data necessary for the processing of the payment as our processors for the purpose of fraud prevention and optimisation of our payment processes (e.g., invoicing, processing of contested payments, accounting support). This serves to protect our legitimate interests in our protection against fraud or in efficient payment management, which outweigh our interests in the context of a balancing of interests.

        </p><p style="text-align: justify;"><b>Legal defence and enforcement of our rights </b>
            The legal basis for the processing of your personal data in the context of legal defence and enforcement of our rights is our legitimate interest. The purpose of processing your personal data in the context of legal defence and enforcement of our rights is the defence against unjustified claims and the legal enforcement and assertion of claims and rights.

        </p><p style="text-align: justify;">   Your personal data will be deleted as soon as they are no longer necessary to achieve the purpose for which they were collected. The processing of your personal data in the context of legal defence and enforcement is mandatory for legal defence and enforcement of our rights. Consequently, there is no possibility for you to object.

        </p><p style="text-align: justify;"><b> Use of customer data for direct marketing purposes </b>
            If you have provided us with your e-mail address when using our Services, we reserve the right to regularly send you e-mail offers for similar services. We do not need to obtain your separate consent for this. In this respect, the data processing is carried out solely on the basis of our legitimate interest in personalised direct advertising. If you have initially objected to the use of your e-mail address for this purpose, we will not send you any e-mails.

        </p><p style="text-align: justify;">   You are entitled to object to the use of your e-mail address for the aforementioned advertising purpose at any time with effect for the future by notifying the responsible person named at the beginning. After receipt of your objection, the use of your e-mail address for advertising purposes will cease immediately. If you wish to object to the data analysis for statistical evaluation purposes, you must unsubscribe from the marketing.

        </p><p style="text-align: justify;"><b>When you send a data subject access request</b>
            The legal basis for the processing of your personal data in the context of handling your data subject access request is our legal obligation and the legal basis for the subsequent documentation of the data subject access request is both our legitimate interest and our legal obligation.

        </p><p style="text-align: justify;">  The purpose of processing your personal data in the context of processing data when you send a data subject access request is to respond to your request. The subsequent documentation of the data subject access request serves to fulfil the legally required accountability.

        </p><p style="text-align: justify;">  Your personal data will be deleted as soon as they are no longer required to achieve the purpose for which they were collected. In the case of the processing of a data subject access request, this is three years after the end of the respective process.

        </p><p style="text-align: justify;">  You have the possibility at any time to object to the processing of your personal data in the context of the processing of a data subject access request for the future. In this case, however, we will not be able to further process your request. The documentation of the legally compliant processing of the respective data subject access request is mandatory. Consequently, there is no possibility for you to object.

        </p><p style="text-align: justify;"><b>Provision of our contractual and business services</b>
            We process the data of our user, supporters, interested parties, customers or other persons, insofar as we offer them contractual services or act within the scope of existing business relationships, e.g., towards user, or are ourselves recipients of services and benefits. Furthermore, we process the data of data subjects on the basis of our legitimate interests, e.g., when it concerns administrative tasks or public relations.

        </p><p style="text-align: justify;"> The data processed in this context, the type, scope and purpose and the necessity of their processing are determined by the underlying contractual relationship. In principle, this includes inventory and master data of the persons (e.g., name, address, etc.), as well as contact data (e.g., e-mail address, telephone, etc.), contract data (e.g., services used, contents and information provided, names of contact persons) and, if we offer services subject to payment, payment data (e.g., bank details, payment history, etc.).

        </p><p style="text-align: justify;"> We delete data that is no longer required to fulfil our statutory and business purposes. This is determined according to the respective tasks and contractual relationships. In the case of business processing, we retain the data for as long as it may be relevant for the processing of the business as well as with regard to any warranty or liability obligations. The necessity of retaining the data is reviewed every three years; otherwise, the statutory retention obligations apply.

        </p><p style="text-align: justify;"><b>Social Media  </b>
            The data you enter on our social media pages, such as comments, videos, pictures, likes, public messages, etc. are published by the social media platform and are not used or processed by us for any other purpose at any time. We only reserve the right to delete content if this should be necessary. Where applicable, we share your content on our site if this is a function of the social media platform and communicate with you via the social media platform. The legal basis is our legitimate interest. The data processing is carried out in the interest of our public relations and communication.

        </p><p style="text-align: justify;">   If you wish to object to certain data processing over which we have an influence, please contact us. We will then examine your objection. If you send us a request on the social media platform, we may also refer you to other secure communication channels that guarantee confidentiality, depending on the response required.

        </p><p style="text-align: justify;">   As already stated, where the social media platform provider gives us the opportunity, we take care to design our social media pages to be as data protection compliant as possible. With regard to statistics that the provider of the social media platform makes available to us, we can only influence these to a limited extent and cannot switch them off. However, we make sure that no additional optional statistics are made available to us.

        </p><p style="text-align: justify;">    Data processing by the operator of the social media platform
            The operator of the social media platform uses web tracking methods. The web tracking can also take place regardless of whether you are logged in or registered with the social media platform. As already explained, we can unfortunately hardly influence the web tracking methods of the social media platform. We cannot, for example, switch this off.

        </p><p style="text-align: justify;">     Please be aware: It cannot be ruled out that the provider of the social media platform uses your profile and behavioural data, for example to evaluate your habits, personal relationships, preferences, etc. We have no influence on this. In this respect, we have no influence on the processing of your data by the provider of the social media platform.

        </p><p style="text-align: justify;">    Data processing in relation to our website and app
            Log files
            In principle, it is possible to use the Collab website without providing personal data. When a page of our website is accessed and each time a file is retrieved, access data about this process is stored in a log file. The corresponding log file contains: Your IP address, the page from which the file was requested, the name of the file, the date and time of the request, the amount of data transferred, the access status (file transferred, file not found, etc.), a description of the type of operating system and web browser used. The stored data does not allow any conclusions to be drawn about your identity and is evaluated exclusively for statistical purposes.

        </p><p style="text-align: justify;">    The collection and processing of this data is carried out in order to enable the use of the website at all, on the basis of our legitimate interest, whereby our legitimate interest is the provision of our website. Incidentally, we store this aforementioned data, including the IP addresses, only in anonymized form and use it only in this anonymized form to analyze the use of the offer and the further development and optimization of our website in your interest. Our legitimate interest is the ongoing improvement of our online offer in order to provide you with the greatest possible user comfort.

        </p><p style="text-align: justify;"><b>General app accesses </b>
            As with every server request, information such as IP address, user agent etc. is transmitted and stored anonymously in the server log for 30 days. The provision of personal data is neither legally nor contractually required, nor is it necessary for the conclusion of a contract. You are also not obliged to provide the personal data. However, failure to provide the data could result in you not being able to use our app or not being able to use it to its full extent. The legal basis for this data processing is consent.

        </p><p style="text-align: justify;"><b> Network access </b>
            The legal basis for this data processing is contract. Your data will be treated confidentially by us and deleted if you revoke the rights to use it or it is no longer required to provide the services and there is no legal obligation to retain it. The provision of personal data is necessary if you wish to make full use of our app. However, failure to provide this data could result in you not being able to use our app or not being able to use it to its full extent.

        </p><p style="text-align: justify;"><b> Contacting Us  </b>
            If you contact us and send us general enquiries the contact details you provide, will be stored and used by us to fulfil the purpose associated with the transmission, e.g., to process your enquiry or in the event of follow-up questions.

        </p><p style="text-align: justify;"> The basis for this storage and use of your personal data is your consent which you give us by sending the contact form. Insofar as you provide us with your personal data for the purpose of responding to your questions, the entry of personal data is required as without this information, we cannot process your request.

        </p><p style="text-align: justify;"> You have the right to revoke your consent to the data processing described above at any time with effect for the future. In this case, we will no longer process your data. Your personal data will be deleted even without your revocation in any case if we have processed your request or if the storage is inadmissible for other legal reasons.

        </p><p style="text-align: justify;"><b> Cookies </b>
            During the use of our website, so-called "cookies", small text files, are stored on your computer. Such cookies register information about your computer's navigation on our website (pages selected, day, time and duration of use, etc.). A cookie is downloaded via a browser the first time you visit a website. The next time you visit this website with the same device, the browser checks whether a corresponding cookie is present (i.e., contains the website name). It sends the data stored in the cookie back to the website. Some cookies are important for the website's functionality and are automatically activated by us when a user visits. Our website also uses cookies to make it easier to use and to provide you with content tailored to your information needs.

        </p><p style="text-align: justify;"> You cannot be personally identified from any of the information we collect. The use of the cookies we use is necessary in order to be able to provide the online offer of Collab at all and, moreover, to be able to optimise it on an ongoing basis. The data processing in this context is therefore based on our legitimate interest. Our legitimate interest is to provide visitors to our website with a functioning online service and to make visiting and using the website as pleasant and efficient as possible.

        </p><p style="text-align: justify;"> For further information on cookies in general, please visit www.allaboutcookies.org and for further details on the cookies we use, please refer to our Cookie Policy.

        </p><p style="text-align: justify;"><b> Creating an account </b>
            Personal data will continue to be collected and processed if you provide it to us for the performance of a contract or when opening an account. Which data is collected can be seen from the respective input forms. Deletion of your account is possible at any time and can be done by sending a message to us. We store and use the data provided by you for the purpose of processing the contract. After complete processing of the contract or deletion of your customer account, your data will be blocked with regard to tax and commercial law retention periods and deleted after expiry of these periods, unless you have expressly consented to a further use of your data or a legally permitted further use of data has been reserved on our part.

        </p><p style="text-align: justify;"><b>Profile </b>
            As a registered user, you have the opportunity to create a user profile with just a few clicks and details. If you make use of the option, the relevant profile data you provide will be transferred to your profile. Of course, you can change the information at any time via the settings in your profile. When creating a profile, you can submit personal data such as your profile picture, business information, photos, a short and biography. Profile content and data are publicly viewable. You have choices about the information on your profile. You don’t have to provide additional information on your profile; however, profile information helps you to get more from our Services. It’s your choice whether to include sensitive information on your profile and to make that sensitive information public. Please do not post or add personal data to your profile that you would not want to be available. The legal basis for the processing of your personal data is the establishment and implementation of the user contract for the use of the service. We store the data until you delete your user account. Insofar as legal retention periods are to be observed, storage also takes place beyond the time of deletion of a user account.

        </p><p style="text-align: justify;"><b>Use of our platform </b>
            If you wish to use the platform, you must register. The provision of the aforementioned data is mandatory. Subsequently, the service user can define his password and complete the registration. For these purposes, we use the e-mail address that is or will be stored in the customer master data for the purpose of the business relationship.

        </p><p style="text-align: justify;"> We process personal data of users for the purpose of using the Collab platform and for the purpose of fulfilling the contract. The users can manage and change all information in the platform. If you use our platform, we store the data required for the fulfilment of the contract until final deletion of the access and/or after expiry of the statutory retention periods. For a longer period, the data could also be processed on the basis of our legitimate interest (legal defense, debt collection, etc.).

        </p><p style="text-align: justify;">  To prevent unauthorized access to your personal data by third parties, the connection is encrypted using TLS technology. When using the platform, we also collect data listed above. When using the platform, no cookies are stored on your computers. Only an encrypted token is stored in the browser, which essentially contains the name of the user and his or her rights. This data point is stored in the browser's internal memory and deleted there as soon as the user logs out. You can delete the token by setting your browser software accordingly.

        </p><p style="text-align: justify;"><b>Contacting others</b>
            Of course, we also process your chats and communications with other user as well as the content you publish, as necessary for the operation of the services. In addition to the information, you may provide us directly, we receive information about you from others. User may provide information about you as they use our services, for instance as they interact with you or if they submit a report involving you.

        </p><p style="text-align: justify;"> We also share some user’ information with service providers and partners who assist us in operating the services. You share information with other user when you voluntarily disclose information on the service (including your profile). Please be careful with your information and make sure that the content you share is stuff that you’re comfortable being visible. If you choose to limit the audience for all or part of your profile or for certain content or information about you, then it will be visible according to your settings.

        </p><p style="text-align: justify;"><b>Installation of our app</b>
            Our app can be downloaded from the app stores "Google Playstore" and "Apple App Store". Downloading our app may require prior registration with the respective app store and installation of the app store software.

            App installation via the Google Playstore
            You can use the Google service "Google Play" of Google Ireland Limited ("Google"), Gordon House, Barrow Street, Dublin 4, Ireland, to install our app.

        </p><p style="text-align: justify;"><b> As far as we are aware, Google collects and processes the following data;  </b>
              <ul>
            <li>License check,
            </li><li>network access,
            </li><li>network connection,
            </li><li>WLAN connections,
            </li><li>location information,
            </li></ul>
            It cannot be ruled out that Google also transmits the information to a server in a third country. We cannot influence which personal data Google processes with your registration and the provision of downloads in the respective app store and app store software. The responsible party in this respect is solely Google as the operator of the Google Play Store. You can find more detailed information in Google's privacy policy, which you can access here: https://policies.google.com/privacy.

        </p><p style="text-align: justify;"> App installation via the Apple App Store
            You can use the Apple service "App Store" a service of Apple Distribution International Ltd, Hollyhill Industrial Estate, Hollyhill Ln, Knocknaheeney, Cork, Ireland, to install our app.

        </p><p style="text-align: justify;"><b>As far as we are aware, Apple collects and processes the following data;</b>

            <li>device identifiers,
            <li>IP addresses,
        <li>location information,

            It cannot be excluded that Apple also transmits the information to a server in a third country. This could in particular be Apple Inc. One Apple Park Way, Cupertino, California, USA, 95014. We cannot influence which personal data Apple processes with your registration and the provision of downloads in the respective app store and app store software. The responsible party in this respect is solely Apple as the operator of the Apple App Store. You can find more detailed information in Apple's privacy policy, which you can access here: https://www.apple.com/legal/privacy/.

        </p><p style="text-align: justify;"><b>Push messages </b>
            The legal basis for Push messages is our legitimate interest. A push service is used to provide you with useful tips and information directly on your mobile device or similar devices. When we send a push message, we send the message with the corresponding IDs or tokens to the Push Notification Service. This then ensures that the push message is sent to the devices that wish to receive such a notification. Our legitimate interest is to be able to present current information to you directly. The personal data will only be processed as long as this is necessary for the provision of the function. You have the right to object. You can prevent your data from being processed further by deactivating the push service in the respective system settings of the operating system of your device.

        </p><p style="text-align: justify;"><b>Firebase </b>
            We use the Firebase service in our app, a service provided by Google LLC ("Google"), 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA and Google Ireland Limited ("Google"), Gordon House, Barrow Street, Dublin 4, Ireland.

        </p><p style="text-align: justify;"> The Firebase is a web hosting and backend service provided by Google LLC or by Google Ireland Limited, depending on the location from which this application is accessed. Firebase is a fast, fully managed, serverless, cloud native NoSQL database that simplifies the storage, synchronization and retrieval of data for mobile, web and IoT applications worldwide.

        </p><p style="text-align: justify;"> The Firebase is used by us to store information such as messages between users. We have concluded a contract for commissioned processing with Google for the use of Google Firebase. Google processes the data on our behalf in order to transmit data stored to your terminal device. Google may transfer this information to third parties where required to do so by law, or where such third parties process the information on Google's behalf.

        </p><p style="text-align: justify;">   By integrating Firebase, we pursue the purpose of being able to offer you a better service within the scope of our app. The legal basis for the processing of personal data described here is our legitimate interest. Our necessary legitimate interest lies in the great benefit that the functions described above have for our offer. The use of Google Firebase gives us the opportunity to provide you with better use and information through our app.

        </p><p style="text-align: justify;">  As part of the processing, Google is entitled to use subcontractors. A list of these subcontractors can be found at https://privacy.google.com/businesses/subprocessors/.

        </p><p style="text-align: justify;">  The processed information will be stored for 6 months and automatically deleted after this retention period.

        </p><p style="text-align: justify;">  For further information on data handling in connection with Google Analytics, please refer to Google's privacy policy:

            <a href="https://support.google.com/analytics/answer/6004245?hl=en">https://support.google.com/analytics/answer/6004245?hl=en </a>
            <a href="https://firebase.google.com/support/privacy">https://firebase.google.com/support/privacy</a>

        </p><p style="text-align: justify;">     Information on Google's privacy settings can be found at https://privacy.google.com/take-control.html?categories_activeEl=sign-in.

        </p><p style="text-align: justify;"><b>Icon links to social networks </b>
            We use small icons that refer to our website on third-party platforms (e.g., Facebook, Instagram, Twitter). These are hyperlinks in each case, so no data is transferred from you automatically, but only when you click on the icons and a new tab opens in your browser with the third-party website. When you visit one of our pages equipped with a Facebook, Instagram, Twitter plugin, a connection to the Facebook, Instagram, or Twitter server is established. This tells the Facebook, Instagram or Twitter server which of our pages you have visited. If you are logged into your Facebook, Instagram, Twitter, account, you enable Facebook, Instagram, Twitter to assign your surfing behavior directly to your personal profile. You can prevent this by logging out of your Facebook, Instagram, Twitter account. Facebook, Instagram, Twitter is used in the interest of an appealing presentation of our online offers.

        </p><p style="text-align: justify;"><b>Hosting</b>
            The services for hosting and displaying the App are partly provided by our service provider Amazon Web Services (AWS) as part of processing on our behalf. Unless otherwise explained in this privacy policy, all access data and all data collected in forms provided for this purpose on this APP are processed on their servers. If you have any questions about our service providers and the basis of our relationship with them, please contact us.

        </p><p style="text-align: justify;"><b>Google Maps</b>
            This website uses Google Maps to display map information when you are using our Select a pickup point feature. When using Google Maps, Google also processes and uses data on the use of the Maps functions by visitors to the web sites. For further information on data processing by Google, please refer to Google's privacy policy at https://www.google.com/intl/en/policies/privacy/. You can also change your privacy settings there in the privacy center. There you can also change your settings in the data protection center so that you can manage and protect your data. The legal basis is consent in accordance with Art. 6 (1) (a) GDPR.

        </p><p style="text-align: justify;">   We may share the data of our visitors, users and their users of users with various third parties, including certain service providers, law enforcement agencies and application developers. In doing so, the data may only be shared in accordance with this policy.

        </p><p style="text-align: justify;"><b>Miscellaneous and Closing </b>
            Children Data
            Our website is not intended for children, and we do not knowingly collect data relating to children. If you become aware that your Child has provided us with Personal Data, without parental consent, please contact us, and we take the necessary steps to remove that information from our server.

        </p><p style="text-align: justify;"><b>External Links</b>
            Our website contains links to the online offers of other providers. We hereby point out that we have no influence on the content of the linked online offers and the compliance with data protection regulations by their providers.

        </p><p style="text-align: justify;"><b>Changes and updates to the privacy policy  </b>
            We kindly ask you to regularly inform yourself about the content of our privacy policy. We will amend the privacy policy as soon as changes to the data processing activities we carry out make this necessary. We will inform you as soon as the changes require an act of cooperation on your part (e.g., consent) or other individual notification.

        </p><p style="text-align: justify;"><b>Concerns and Contact</b>
            If you have any concerns about a possible compromise of your privacy or misuse of your personal data on our part, or any other questions or comments, you can contact us.

        </p><p style="text-align: justify;"><b> Exercising your rights</b>
            If you would like to exercise any of our rights as set out above in the” What are your rights?” section above or have a complaint, please contact us using  <a mailto="info@bewithcollab.com">info@bewithcollab.com</a>. Any such request will be responded to within one month and we might require proof of identity to verify and process your request. For more information about these rights, please contact us.

        </p>
    </div>
    <!-- end of privacy policy and start terms and conditions --->
                <div class="container">
                    <div style="text-align:center">
                        <img src="https://bewithcollab.com/assets/img/logo1.jpg"  alt="alt-text" />
                        <p style="text-align: justify;"> <h4 class="title">Terms and Conditions</h4></p>
                    </div>





                   <p style="text-align: justify;"> Welcome to the Collab website and/or Collab iOS and Android mobile application (our “Platform”). This agreement applies as between you, the User of this Platform and Collab Portal of Cluster R - Jumeirah Lakes, Sheikh Zayed Road, Dubai, United Arab Emirates (“Collab”, “we” or “us”), the operator(s) of this Platform. Your agreement to comply with and be bound by these terms and conditions is deemed to occur upon your first use of the Platform. If you do not agree to be bound by these terms and conditions, you should stop using the Platform immediately.
                   </p>
                    <p style="text-align: justify;">You agree that by accessing the Platform, you have read, understood, and agree to be bound by all of these Terms and Conditions. If you do not agree with all of these Terms and Conditions, then you are expressly prohibited from using the Platform and you must discontinue use immediately.
                    </p>
                    <p style="text-align: justify;">These Terms and Conditions (the “Terms”) constitute a legal agreement between you and us governing the use of our Platform and our Services. We license use of our Platform to you on the basis of these Terms. We do not sell our Platform to you, and we remain the owner of our Platform at all times.
                   </p>
                    <strong>IMPORTANT NOTICE TO ALL USERS:  </strong>
                     <ul>
                         <li><p style="text-align: justify">	The terms of this agreement include, in particular, limitations on liability and an indemnity.   </li>

                         </p> <li><p style="text-align: justify">	If you do not agree to the terms of this agreement, we will not license use of our platform to you, and you must not use our platform. </li>

                         </p> <li><p style="text-align: justify">	Depending on the version of the Application you have downloaded, these Terms incorporate Apple’s or Android’s terms and conditions and privacy policies (“Platform Terms”). If there is any conflict between these Terms and the Platform Terms, then these Terms will prevail.  </li>

                         </p> <li><p style="text-align: justify">	We may from time to time vary these Terms. Please check these Terms regularly to ensure you are aware of any variations made by us. If you continue to use this Platform, you are deemed to have accepted such variations. If you do not agree to such variations, you should not use the Platform. </li>
                     </p>
                     </ul>
                     <ol >
                         <li>	<b>Terms of use  </b></li>

                    <p style="text-align: justify">1.1.	The provisions set out in these Terms govern your access to and your use of our Platform and shall constitute a legally binding agreement between you and us. We may change such terms from time to time and shall notify you accordingly if we do. If you do not agree to such terms, you must not use our Platform.
                    </p><p style="text-align: justify">1.2.	Subject to you agreeing to abide by these Terms, we hereby grant to you a revocable, non-exclusive and non-transferable license to use our Platform on these Terms.
                         </p><p style="text-align: justify">1.3.	By registering for an Account, which involves providing us with certain mandatory and voluntary information as required for a successful registration and using our Platform, you agree and acknowledge that:
                         </p><p style="text-align: justify">1.3.1.	you have read the terms set out in these Terms and agree to be bound by and comply with them; and
                         </p><p style="text-align: justify">1.3.2.	you shall ensure that all Users of your Account abide by these Terms.
                         </p><p style="text-align: justify">1.4.	You are responsible for maintaining the confidentiality of your Account and you are responsible for all activities that occur under your Account. You agree that all actions carried out by any person through your Account shall be deemed to be an act carried out by you, and you shall ensure that all persons who have access to and use your Account are authorised to do so. We are not responsible for any loss, damage or liabilities arising as a result of or in connection with the wrongful, fraudulent or illegal use of your Account.
                         </p><p style="text-align: justify">1.5.	We reserve the right to, without any notice, explanation, or liability and in our sole discretion, refuse to allow you or suspend your access to our Platform or your Account at any time, or remove or edit content (including content submitted by you) on our Platform or on any of our affiliated websites (including social media pages).
                         </p><p style="text-align: justify">1.6.	We reserve the right to change, modify, suspend, or discontinue any portion of the Services, our Platform or any other products, services, affiliated websites (including social media pages) and/or other software provided by us in connection with any of the foregoing at any time. You agree that access to or operation of any of the foregoing may from time to time be interrupted or encounter technical difficulties.
                         </p><p style="text-align: justify">1.7.	Save to the extent permitted by us in writing, you are not permitted to use, or submit any content to, our Platform or any of our affiliated websites to advertise, promote or market any products or services of any third party or yourself.


                         </p><li>	<b>Subscription  </b></li>

                         <p style="text-align: justify"> 2.1.	You become a subscriber to our Platform by completing the registration of an Account.
                         </p><p style="text-align: justify">2.2.	Some Services may require payment of subscription fees and/or other ad-hoc or ancillary fees before you can access or use them (“Fees”). These Fees will be notified to you through our Platform.
                         </p><p style="text-align: justify">2.3.	If you purchase a recurring subscription from us, the subscription period for your Account shall be renewed automatically at the expiry of each subscription period, until terminated successfully through our Platform. By purchasing the recurring subscription, you authorise us or our related corporations to automatically charge the Fees:
                         </p><p style="text-align: justify">2.3.1.	upon the commencement of your first subscription period, upon expiration of any applicable trial period or at a date otherwise indicated by us; and
                         </p><p style="text-align: justify">2.3.2.	on the renewal date of the subscription period thereafter, without any further action by you.
                         </p><p style="text-align: justify"> 2.4.	Any Fees due in relation to your Account must be paid by their due date for payment, as notified to you through our Platform or otherwise. Failure to make timely payment of the Fees may result in the suspension or termination of your access to your Account and/or our Platform or any of the Services.
                         </p><p style="text-align: justify">2.5.	Our Fees may be amended from time to time at our discretion. We will provide you reasonably advanced written notice of any amendment of recurring Fees. Your continued use of a recurring subscription will constitute acceptance of the amended Fees.
                         </p><p style="text-align: justify">2.6.	You shall be responsible for any applicable taxes (including any goods and services tax) under these Terms.
                         </p><p style="text-align: justify">2.7.	All payments shall be made by using the payment methods specified by us from time to time. You acknowledge and agree that you are subject to the applicable user agreement of any third-party payment methods. We shall not be liable for any failure, disruption, or error in connection with your chosen payment method. We reserve the right at any time to modify or discontinue, temporarily or permanently, any payment method without notice to you or giving any reason.
                         </p><p style="text-align: justify">2.8.	We must receive payment in full no later than the day on which such payment is required to be paid in immediately available and freely transferable funds, without any restriction, condition, withholding, deduction, set-off or counterclaim whatsoever.
                         </p><p style="text-align: justify">2.9.	Unless otherwise notified in writing by us, termination of your Account for any reason whatsoever shall not entitle you to any refund of the Fees. If you cancel your subscription to our Platform, you may continue to access your Account until the expiry of the subscription period in which the cancellation occurred.
                         </p><p style="text-align: justify">2.10.	We may at our sole and absolute discretion, offer a refund of Fees for a particular subscription period where no actions have been taken in respect of your Account during that subscription period and you have notified us in writing of your intention to terminate your subscription within three (3) days of the due date for payment for that subscription period.


                         </p><li>	<b>Uploading content to our Platform  </b></li>


                         <p style="text-align: justify">3.1.	You irrevocably and unconditionally represent and warrant that any of your content uploaded to our Platform complies with our Privacy Policy and any other applicable laws.
                         </p><p style="text-align: justify">3.2.	You are fully responsible for your content uploaded to our Platform. We will not be responsible, or liable to any third party, for:
                         </p><p style="text-align: justify">3.2.1.	the content or accuracy of any content or data uploaded by you, by us on your behalf, or any other user of our Platform; or
                         </p><p style="text-align: justify">3.2.2.	the loss of any content or data provided to us by you. You should keep a record of all such content and data.
                         </p><p style="text-align: justify">3.3.	We will only use the content uploaded by you for the purposes of carrying out the Services, carrying out our obligations in this Agreement and any other purpose expressly set out in this Agreement or otherwise agreed between us. We will not otherwise disclose or distribute the content uploaded by you, save for when required by law, a court of competent jurisdiction or any governmental or regulatory authority.
                         </p><p style="text-align: justify">3.4.	We may use the content uploaded by you for the purpose of data analytics or to implement artificial intelligence or machine learning. Any such content shall be anonymized and used only for the purposes of improving the Services and our response to users of the Platform.
                         </p><p style="text-align: justify">3.5.	We have the right to disclose your identity to any third party claiming that any content posted or uploaded by you to our Platform constitutes a violation of their rights under Applicable law.
                         </p><p style="text-align: justify">3.6.	We have the right to delete any content uploaded to our Platform if, in our opinion, it does not comply with the content standards set out.
                         </p><li>	<b> Contribution license </b></li>

                         </p><p style="text-align: justify">4.1.	By posting your Contributions to any part of the Platform or making Contributions accessible to the Platform by linking your account from the Platform to any of your social networking accounts, you automatically grant, and you represent and warrant that you have the right to grant, to us an unrestricted, unlimited, irrevocable, perpetual, non-exclusive, transferable, royalty-free, fully-paid, worldwide right, and license to host, use, copy, reproduce, disclose, publish, broadcast, retitle, archive, store, cache, publicly perform, publicly display, reformat, translate, transmit, excerpt (in whole or in part), and distribute such Contributions (including, without limitation, your image) for any purpose, commercial, advertising, or otherwise, and to prepare derivative works of, or incorporate into other works, such Contributions, and grant and authorise sublicenses of the foregoing. The use and distribution may occur in any media formats and through any media channels.
                         </p><p style="text-align: justify">4.2.	This license will apply to any form, media, or technology now known or hereafter developed, and includes our use of your name, company name, and franchise name, as applicable, and any of the trademarks, service marks, trade names, logos, and personal and commercial images you provide. You waive all moral rights in your Contributions, and you warrant that moral rights have not otherwise been asserted in your Contributions.
                         </p><p style="text-align: justify">4.3.	We do not assert any ownership over your Contributions. You retain full ownership of all of your Contributions and any intellectual property rights, or other proprietary rights associated with your Contributions. We are not liable for any statements or representations in your Contributions provided by you in any area on the Platform.
                         </p><p style="text-align: justify">4.4.	You are solely responsible for your Contributions to the Platform, and you expressly agree to exonerate us from any and all responsibility and to refrain from any legal action against us regarding your Contributions.
                         </p><p style="text-align: justify">4.5.	We have the right, in our sole and absolute discretion,
                         </p><p style="text-align: justify">4.5.1.	to edit, redact, or otherwise change any Contributions;
                         </p><p style="text-align: justify">4.5.2.	to re-categorize any Contributions to place them in more appropriate locations on the Platform; and
                         </p><p style="text-align: justify">4.5.3.	to pre-screen or delete any Contributions at any time and for any reason, without notice.
                         </p><p style="text-align: justify">4.6.	We have no obligation to monitor your Contributions.
                         </p><p style="text-align: justify">4.7.	Nothing contained in this Agreement shall be construed to create an entitlement to any share of, payment of, or other form of compensation in, any income or revenues generated ,including but not limited to advertising, search, promotions, sponsorship, usage, statistics, data analysis, partnerships, by Collab through Collab`s use, promotion or any commercial exploitation whatsoever of the by you uploaded content, materials, submissions, in any form or form, media, or technology now known or hereafter developed.
                         </p><li>	<b>  Apple and Android Devices</b></li>

                         </p><p style="text-align: justify">5.1.	The following terms apply when you use a mobile application obtained from either the Apple’s, Android’s store (each an “App Distributor”) to access the Platform:
                         </p><p style="text-align: justify">5.1.1.	the License granted to you for our mobile application is limited to a non-transferable License to use the application on a device that utilizes the Apple iOS or Android operating systems, as applicable, and in accordance with the usage rules set forth in the applicable App Distributor’s terms of service;
                         </p><p style="text-align: justify">5.1.2.	we are responsible for providing any maintenance and support services with respect to the mobile application as specified in the terms and conditions of this mobile application License contained in these Terms and Conditions or as otherwise required under applicable law, and you acknowledge that each App Distributor has no obligation whatsoever to furnish any maintenance and support services with respect to the mobile application;
                         </p><p style="text-align: justify">5.1.3.	in the event of any failure of the mobile application to conform to any applicable warranty, you may notify the applicable App Distributor, and the App Distributor, in accordance with its terms and policies, may refund the purchase price, if any, paid for the mobile application, and to the maximum extent permitted by applicable law, the App Distributor will have no other warranty obligation whatsoever with respect to the mobile application;
                         </p><p style="text-align: justify">5.1.4.	you must comply with applicable third-party terms of agreement when using the mobile application, and
                         </p><p style="text-align: justify">5.1.5.	you acknowledge and agree that the App Distributors are third-party beneficiaries of the terms and conditions in this mobile application License contained in these Terms and Conditions, and that each App Distributor will have the right (and will be deemed to have accepted the right) to enforce the terms and conditions in this mobile application License contained in these Terms and Conditions against you as a third-party beneficiary thereof.
                         </p><li>	<b> Prohibited uses </b></li>

                         </p><p style="text-align: justify">6.1.	You may use our Platform only for lawful purposes. You may not use our Platform:
                         </p><p style="text-align: justify">6.1.1.	in any way that breaches any applicable local or international laws or regulations;
                         </p><p style="text-align: justify">6.1.2.	in any way that is unlawful or fraudulent, or has any unlawful or fraudulent purpose or effect;
                         </p><p style="text-align: justify"> 6.1.3.	to send, knowingly receive, upload, download, use or re-use any material which does not comply with our content standards as set out in our prevailing terms and conditions as amended from time to time; and
                         </p><p style="text-align: justify">6.1.4.	to knowingly transmit any data, send or upload any material that contains viruses, Trojan horses, worms, time-bombs, keystroke loggers, spyware, adware or any other harmful programs or similar computer code designed to adversely affect the operation of any computer software or hardware.
                         </p><p style="text-align: justify">6.2.	You also agree:
                         </p><p style="text-align: justify">6.2.1.	not to reproduce, duplicate, copy or re-sell any part of our Platform in contravention of the provisions of our Terms; and
                         </p><p style="text-align: justify">6.2.2.	not to access without authority, interfere with, damage or disrupt:
                         </p><p style="text-align: justify">6.2.3.	any part of our Platform;
                         </p><p style="text-align: justify">6.2.4.	any equipment or network on which our Platform is stored;
                         </p><p style="text-align: justify">6.2.5.	any software used in the provision of our Platform; or
                         </p><p style="text-align: justify">6.2.6.	any equipment or network or software owned or used by any third party.
                         </p><p style="text-align: justify">6.3.	Except as expressly set out in this Agreement or as permitted by any applicable law, you undertake:
                         </p><p style="text-align: justify">6.3.1.	save for internal distribution amongst your employees and persons authorised by you for your internal business purposes, and any other purposes contemplated under these Terms or the Platform, not to reproduce, copy, modify, adapt, translate, publish, display, communicate, transmit, sell, exploit or use the whole or any part of any Service, our Platform or any of the contents therein for any commercial or other purposes;
                         </p><p style="text-align: justify">6.3.2.	not to disassemble, decompile, reverse-engineer or create derivative works based on the whole or any part of the source code of our Platform nor attempt to do any such thing, or to reproduce, display or otherwise provide access to the Services, our Platform or any of the contents therein, including but not limited to framing, mirroring, linking, spidering, scraping or any other technological means;
                         </p><p style="text-align: justify">6.3.3.	not to provide or otherwise make available our Platform in whole or in part (including but not limited to program listings, object and source program listings, object code and source code), in any form to any person without prior written consent from us;
                         </p><p style="text-align: justify">6.3.4.	to include our copyright notice on all entire and partial copies you make of our Platform on any medium;
                         </p><p style="text-align: justify">6.3.5.	to comply with all applicable technology control or export laws and regulations; and
                         </p><p style="text-align: justify"> 6.3.6.	not to disrupt, disable, or otherwise impair the proper working of the Services, our Platform or our servers, such as through hacking, cyber-attacks (including but not limited to denial-of-service attacks), tampering or reprogramming.
                         </p><li>	<b> Collab Post Wall </b></li>

                         </p><p style="text-align: justify">7.1.	The Collab Post Wall and its contents have been compiled with the greatest possible care. However, Collab does not accept any liability or guarantee for the topicality, correctness and completeness of the information provided on our blog.
                         </p><p style="text-align: justify">7.2.	Liability claims against Collab, which refer to material or non-material damages, which have been caused by the use or non-use of the information provided or by the use of incorrect and incomplete information, are fundamentally excluded, provided that there is no demonstrable intentional or grossly negligent fault on the part of Collab.
                         </p><p style="text-align: justify">7.3.	Collab expressly reserves the right to change, supplement or delete parts of the pages or the entire blog without separate announcement or to discontinue the publication temporarily or permanently.
                         </p><p style="text-align: justify">7.4.	All data is published conscientiously but without guarantee.
                         </p><p style="text-align: justify">7.5.	Errors in the content will be corrected immediately upon being brought to our attention. All rights, including those of reprinting extracts, photomechanical reproduction and translation, are reserved and require the written consent of Collab. Unauthorized use, even of extracts, will be prosecuted.
                         </p><li>	<b> Reliance on Information</b></li>

                         </p><p style="text-align: justify">8.1.	The Platform is intended to provide general information and entertainment only and, as such, should not be considered as a substitute for advice covering any specific situation. You should seek appropriate advice before taking or refraining from taking any action in reliance on any information contained in the Platform.
                         </p><p style="text-align: justify">8.2.	The information provided on the Platform is not intended for distribution to or use by any person or entity in any jurisdiction or country where such distribution or use would be contrary to law or regulation or which would subject us to any registration requirement within such jurisdiction or country.
                         </p><li><b>Platform Management </b></li>

                         </p><p style="text-align: justify"> 9.1.	We reserve the right, but not the obligation, to:
                         </p><p style="text-align: justify"> 9.1.1.	monitor the Platform for violations of these Terms and Conditions;
                         </p><p style="text-align: justify">9.1.2.	take appropriate legal action against anyone who, in our sole discretion, violates the law or these Terms and Conditions, including without limitation, reporting such user to law enforcement authorities;
                         </p><p style="text-align: justify">9.1.3.	in our sole discretion and without limitation, refuse, restrict access to, limit the availability of, or disable (to the extent technologically feasible) any of your Contributions or any portion thereof;
                         </p><p style="text-align: justify">9.1.4.	in our sole discretion and without limitation, notice, or liability, to remove from the Platform or otherwise disable all files and content that are excessive in size or are in any way burdensome to our systems;
                         </p><p style="text-align: justify">9.1.5.	otherwise manage the Platform in a manner designed to protect our rights and property and to facilitate the proper functioning of the Platform.
                         </p><li>	<b> Intellectual property rights </b></li>

                         </p><p style="text-align: justify">10.1.	You acknowledge that all intellectual property rights in our Platform anywhere in the world belong to us, that rights in our Platform are licensed (not sold) to you, and that you have no rights in, or to, our Platform other than the right to use them in accordance with these Terms.
                         </p><p style="text-align: justify">10.2.	Any intellectual property rights in content uploaded by you to our Platform shall continue to belong to you or their respective owners. You agree that you grant us a royalty-free and non-exclusive license to use, reproduce, publish and display such intellectual property rights for the purposes of performing the Services, promotional purposes, internal administrative purposes and any other purposes set out in these Terms, including for the purpose of improving the Services and our responses to users of the Platform.
                         </p><p style="text-align: justify">10.3.	You acknowledge that you have no right to have access to our Platform in source code form.
                         </p><p style="text-align: justify">10.4.	Save for internal distribution amongst your employees and persons authorised by you for your internal business purposes and any other purposes contemplated under these Terms or the Platform, you must not modify the paper or digital copies of any materials you have printed off or downloaded from our Platform in any way and you must not use any illustrations, photographs, video or audio sequences or any graphics separately from any accompanying text.
                         </p><p style="text-align: justify">10.5.	Our status (and that of any identified contributors) as the authors of content on our Platform must always be acknowledged.
                         </p><p style="text-align: justify">10.6.	You must not use any part of the content on our Platform for commercial purposes not specified on our Platform without obtaining a license to do so from us or our licensors.
                         </p><p style="text-align: justify">10.7.	If you print off, copy, or download any content on our Platform in breach of this Agreement, your right to use our Platform will cease immediately and you must, at our option, return or destroy any copies of the materials you have made.
                         </p><li><b>Warranties</b></li>

                         </p><p style="text-align: justify">11.1.	While we make all efforts to maintain the accuracy of the information on our Platform, we provide the Services, Platform and all Related Content on an “as is” and “as available” basis, unless otherwise specified in writing. We make no representations or warranties of any kind, express or implied, as to the operation of any of the foregoing, unless otherwise specified in writing.
                         </p><p style="text-align: justify">11.2.	As part of the Services, you may communicate with Third Parties and have access to Third Party’s Advice. Any information about Third Parties is provided on an “as is” basis, based on information provided to us by the Third Parties. We do not make any warranties, express or implied, as to the qualifications, quality, suitability, fitness for purpose, completeness or correctness of any Third Party or Third Party’s Advice.
                         </p><p style="text-align: justify">11.3.	You acknowledge that Third Parties are not our agents or employees, and all Third Parties are solely responsible for any Third Party’s Advice. No Third Party is authorised to make any statement or representation for and on behalf of us. While we have conducted basic checks on Third Parties, we do not make any representations or warranties as to the qualifications or experience of any Third Party and you are encouraged to conduct your own due diligence on each Third Party, including whether such Third Party and Third Party’s Advice is relevant or suitable for your needs.
                         </p><p style="text-align: justify">11.4.	To the full extent permissible by law, we disclaim all warranties, express or implied, relating to our Platform or any Services, including but not limited to implied warranties of merchantability and fitness for a particular purpose. We do not warrant that the Services, our Platform, the Related Content, or electronic communications sent by us are free of viruses or other harmful components.
                         </p><li>	<b>Limitation of Liability</b></li>

                         </p><p style="text-align: justify">12.1.	We are not liable for the completeness, accuracy or correctness of any information uploaded on our Platform and any Related Content. You expressly agree that your use of the Services and our Platform, including reliance on any Third Party’s Advice, is at your sole risk.
                         </p><p style="text-align: justify">12.2.	We do not assist with dispute resolution between any you and any Third Party and are not obliged at any time to adjudicate on any such dispute. In the event of any dispute, you are responsible for contacting the relevant Third Party. Without prejudice to the foregoing, we remain entitled at all times to investigate at our discretion any complaint regarding the use of our Platform or any suspected unlawful activity and to take any action that we deem appropriate, including to file a report with the appropriate authorities.
                         </p><p style="text-align: justify">12.3.	You agree not to use the Services, our Platform and the Related Content for any re-sale purposes, and we have no liability to you, whether in contract, tort (including negligence), breach of statutory duty, or otherwise, arising under or in connection with these Terms (including but not limited to the use of, or inability to use, the Services, our Platform or any other website or software) for:
                         </p><p style="text-align: justify">12.3.1.	loss of profits, sales, business, or revenue;
                         </p><p style="text-align: justify">12.3.2.	business interruption;
                         </p><p style="text-align: justify">12.3.3.	loss of anticipated savings;
                         </p><p style="text-align: justify">12.3.4.	loss or corruption of data or information;
                         </p><p style="text-align: justify">12.3.5.	loss of business opportunity, goodwill or reputation; or
                         </p><p style="text-align: justify">12.3.6.	any other indirect or consequential loss or damage.
                         </p><p style="text-align: justify"> 12.4.	Nothing in these Terms shall limit or exclude our liability for:
                         </p><p style="text-align: justify">12.4.1.	death or personal injury resulting from our negligence;
                         </p><p style="text-align: justify">12.4.2.	fraud; and/or
                         </p><p style="text-align: justify">12.4.3.	any other matter in respect of which we are prohibited under applicable law from limiting or excluding our liability.
                         </p><p style="text-align: justify">12.5.	Our Platform is not intended to serve a record-keeping function and we shall not be liable for any loss of data or content.
                         </p><p style="text-align: justify">12.6.	These Terms set out the full extent of our obligations and liabilities in respect of the supply of the Services and our Platform. Except as expressly stated in these Terms, there are no conditions, warranties, representations or other terms, express or implied, that are binding on us. Any condition, warranty, representation or other term concerning the supply of the Services and our Platform which might otherwise be implied into, or incorporated in, these Terms whether by statute, common law or otherwise, is excluded to the fullest extent permitted by law.
                         </p><li>	<b>Indemnity</b></li>

                         </p><p style="text-align: justify">You agree to indemnify and hold us, our related, and our respective directors, officers, employees, agents and representatives, independent contractors, licensees, successors and assigns harmless from and against all claims, losses, expenses, damages and costs (including but not limited to direct, incidental, consequential, exemplary and indirect damages), and reasonable legal fees, resulting from or arising out of your act, default or omission, whether in your use of our Platform, Services, and/or any websites or software in relation thereto or otherwise, and whether in respect of your breach of these Terms or any laws or regulations or otherwise.
                         </p><li>	<b>Privacy</b></li>

                         </p><p style="text-align: justify">14.1.	For the purposes of applicable data protection legislation, Collab will process any personal data you have provided to us in accordance with our Privacy Policy available on the Collab website.
                         </p><p style="text-align: justify">14.2.	You agree that, if you have provided Collab with personal data relating to a third party (a) you have in place all necessary appropriate consents and notices to enable lawful transfer such personal data to Collab and (b) that you have brought to the attention of any such third party the Privacy Policy available on the Collab’s website or otherwise provided a copy of it to the third party. You agree to indemnify Collab in relation to all and any liabilities, penalties, fines, awards, or costs arising from your non-compliance with these requirements.
                         </p><li>	<b>Modifications to Terms of Service and Other Policies.</b></li>

                         </p><p style="text-align: justify">15.1.	Collab may modify these terms or any additional terms that apply to the Service to, for example, reflect changes to the law or changes to the Service. You should look at the terms regularly. Collab will post notice of modifications to these terms, or other policies referenced in these terms at the applicable URL for such policies.
                         </p><p style="text-align: justify">15.2.	Changes will not apply retroactively and will become effective no sooner than 14 days after they are posted. If You do not agree to the modified terms for the Service, you should discontinue Your use of our Platform.
                         </p><p style="text-align: justify">15.3.	No amendment to or modification of this Agreement will be binding unless (a) in writing and signed by a duly authorised representative of Collab, (b) You accept updated terms online, or (c) You continue to use the Service after Collab has posted updates to the Agreement or to any policy governing the Service.
                         </p><li>	<b>Modifications And Interruptions</b></li>

                         </p><p style="text-align: justify">16.1.	We reserve the right to change, modify, or remove the contents of the Platform at any time or for any reason at our sole discretion without notice. However, we have no obligation to update any information on our Platform. We also reserve the right to modify or discontinue all or part of the Platform without notice at any time.
                         </p><p style="text-align: justify">16.2.	We will not be liable to you or any third party for any modification, price change, suspension, or discontinuance of the Platform.
                         </p><p style="text-align: justify">16.3.	We cannot guarantee the Platform will be available at all times. We may experience hardware, software, or other problems or need to perform maintenance related to the Platform, resulting in interruptions, delays, or errors.
                         </p><p style="text-align: justify">16.4.	We reserve the right to change, revise, update, suspend, discontinue, or otherwise modify the Platform at any time or for any reason without notice to you. You agree that we have no liability whatsoever for any loss, damage, or inconvenience caused by your inability to access or use the Platform during any downtime or discontinuance of the Platform.
                         </p><p style="text-align: justify">16.5.	Nothing in these Terms and Conditions will be construed to obligate us to maintain and support the Platform or to supply any corrections, updates, or releases in connection therewith.
                         </p><li><b>Corrections</b></li>

                         </p><p style="text-align: justify">There may be information on the Platform that contains typographical errors, inaccuracies, or omissions that may relate to the Platform, including descriptions, pricing, availability, and various other information. We reserve the right to correct any errors, inaccuracies, or omissions and to change or update the information on the Platform at any time, without prior notice.
                         </p><li>	<b>Availability of the Platform</b></li>

                         </p><p style="text-align: justify">18.1.	The Service is provided “as is” and on an “as available” basis. We give no warranty that the Service will be free of defects and / or faults. To the maximum extent permitted by the law we provide no warranties (express or implied) of fitness for a particular purpose, accuracy of information, compatibility, and satisfactory quality.
                         </p><p style="text-align: justify">18.2.	Collab accepts no liability for any disruption or non-availability of the Platform resulting from external causes including, but not limited to, ISP equipment failure, host equipment failure, communications network failure, power failure, natural events, acts of war or legal restrictions and censorship.
                         </p><li>	<b>Content Standards</b></li>

                         </p><p style="text-align: justify">19.1.	These content standards apply to any and all information and material which you post or upload on our Platform (“Contributions”).
                         </p><p style="text-align: justify"> 19.2.	You must comply with the spirit of the following standards as well as the letter. The standards apply to each part of any Contribution as well as to its whole.
                         </p><p style="text-align: justify">19.3.	Contributions must:
                         </p><p style="text-align: justify">19.3.1.	comply with applicable law, in particular, the General Data Protection Regulation and the laws of any country from which they are posted; and
                         </p><p style="text-align: justify">19.3.2.	be placed in the correct and appropriate categories.
                         </p><p style="text-align: justify">19.3.3.	You shall be responsible for ensuring all Contributions are up-to-date, authentic, truthful and accurate. You shall be responsible for the origin of the Contributions and must ensure that you either have all ownership rights to the Contributions posted or all rights and/or consents or licenses allowing you to upload and post the Contributions to and on our Platform.
                         </p><p style="text-align: justify">19.4.	Contributions must not:
                         </p><p style="text-align: justify">19.4.1.	infringe any intellectual property right of any other person;
                         </p><p style="text-align: justify">19.4.2.	be made in breach of any legal duty owed to a third party, such as a contractual duty, a duty of confidence or any duty arising under law;
                         </p><p style="text-align: justify">19.4.3.	contain any material which is defamatory of any person, obscene, offensive, or inflammatory or promotes any illegal activity, discrimination, violence, or ill-will and hostility;
                         </p><p style="text-align: justify">19.4.4.	be threatening or abusive, invade another’s privacy, or cause or be likely to cause annoyance, alarm, inconvenience or needless anxiety to any other person;
                         </p><p style="text-align: justify">19.4.5.	be used to impersonate any person, or to misrepresent your identity or affiliation with any person;
                         </p><p style="text-align: justify">19.4.6.	give the impression that they emanate from us, if this is not the case; or
                         </p><p style="text-align: justify">19.4.7.	advocate, promote or assist any unlawful act or otherwise contain any material which is criminal in nature.
                         </p><p style="text-align: justify">19.5.	We reserve the right to request that you amend or delete the Contributions if it is found that any of the Contributions posted by you is in contravention of this acceptable use policy.
                         </p><p style="text-align: justify">19.6.	Where you choose to terminate your account with us, you may delete all previous Contributions made by you and retain a copy of the same.
                         </p><li>	<b> Suspension and termination </b></li>

                         </p><p style="text-align: justify">20.1.	We will determine, in our discretion, whether there has been a breach of this acceptable use policy through your use of our Platform. When a breach of this policy has occurred, we may take such action as we deem appropriate.
                         </p><p style="text-align: justify">20.2.	Failure to comply with this acceptable use policy constitutes a material breach of the terms of use upon which you are permitted to use our App, and may result in our taking all or any of the following actions:
                         </p><p style="text-align: justify">20.2.1.	immediate temporary or permanent withdrawal of your right to use our Platform;
                         </p><p style="text-align: justify">20.2.2.	immediate temporary or permanent removal of any Contribution;
                         </p><p style="text-align: justify">20.2.3.	issuance of a warning to you;
                         </p><p style="text-align: justify">20.2.4.	legal proceedings against you for reimbursement of all costs on an indemnity basis (including but not limited to reasonable administrative and legal costs) resulting from the breach;
                         </p><p style="text-align: justify">20.2.5.	further legal action against you; and/or
                         </p><p style="text-align: justify">20.2.6.	disclosure of such information to law enforcement authorities as we reasonably feel is necessary.
                         </p><p style="text-align: justify">20.3.	We exclude liability for actions taken in response to breaches of this acceptable use policy. The responses described in this policy are not limited, and we may take any other action we reasonably deem appropriate.
                         </p><li>	<b>No Waiver</b></li>

                         </p><p style="text-align: justify">In the event that any party to these Terms and Conditions fails to exercise any right or remedy contained herein, this shall not be construed as a waiver of that right or remedy.
                         </p><li>	<b>Previous Terms and Conditions</b></li>

                         </p><p style="text-align: justify">In the event of any conflict between these Terms and Conditions and any prior versions thereof, the provisions of these Terms and Conditions shall prevail unless it is expressly stated otherwise.
                         </p><li>	<b> Severability </b></li>

                         </p><p style="text-align: justify">To the extent that any provision of this Agreement is found by a court of competent jurisdiction to be invalid or unenforceable, that provision notwithstanding, the remaining provisions of this Agreement shall remain in full force and effect and such invalid or unenforceable provision shall be deleted.
                         </p><li>	<b>Law and Jurisdiction </b></li>

                         </p><p style="text-align: justify">These terms and conditions and the relationship between you and Collab shall be governed by and construed in accordance with the Law of the United Arab Emirates and Collab and you agree to submit to the exclusive jurisdiction of the Courts of Dubai.
                     </ol>
                    <p style="text-align: justify;">
              Version 1.0, April 29, 2021
            </p>


      </div>
    </div>

              </section>
  </body>
</html>
