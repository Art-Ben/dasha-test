<?php
/*
Template Name: Contact page
Template Post Type: page
*/
?>

<div class="cstContactPage">
    <div class="cstContactPage__info" itemscope itemtype="http://schema.org/Organization">
         <span class="cstContactPage__info--title" itemprop="name">Some oraganization name</span>
         <span class="cstContactPage__info--subtitle">Contact us</span>
         <div class="cstContactPage__info--address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
              <span class="line">Address:</span>
              <span class="line" itemprop="addressLocality">Киев</span>,
              <span class="line" itemprop="streetAddress">Алея лип, Київ</span>,
              <span class="line" itemprop="postalCode">02000</span>
         </div>
         <div class="telephone_email">
            <div class="ln">
                Telephone: <span itemprop="telephone">+380 (98) 777 77 77</span>
            </div>
            
            <div class="ln">
                Электронная почта: <span itemprop="email">test@test.com</span>
            </div>
         </div>
    </div>

    <iframe class="cstMap"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14372.19863213127!2d30.537420899874537!3d50.447251270747095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cfab057acf09%3A0x2532d57518920e1d!2z0L_QsNC80Y_RgtC90LjQuiDQn9C40LvQuNC_0YMg0J7RgNC70YvQutGD!5e0!3m2!1sru!2sua!4v1590508590568!5m2!1sru!2sua"
        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>