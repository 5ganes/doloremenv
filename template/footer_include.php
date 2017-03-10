<!-- Section: footer section -->
  <section>
    <!-- <header class="major">
      <h2>Ipsum sed dolor</h2>
    </header> -->
    <div class="posts footer-div">
      <article>
        <?php
        $about = $groups->getById(ABOUT);
        $about = $conn->fetchArray($about);
        ?>
        <h3><?php if($lan=='en') echo $about['nameen']; else echo $about['name'];?></h3>
        <p><?php if($lan=='en') echo $about['shortcontentsen']; else echo $about['shortcontents'];?></p>
        <ul class="actions">
          <li><a href="<?php if($lan=='en') echo 'en/'; echo $about['urlname'] ?>" class="button big">Read More</a></li>
        </ul>
      </article>
      <article>
        <h3><?php if($lan=='en') echo 'Important Links'; else echo 'महत्वपुर्ण लिंकहरु';?></h3>
        <ul class="contact">
          <?php
            $links = $groups->getByParentIdAndTypeWithLimit('Important Links', 0, 4);
            while($row = $conn->fetchArray($links)){
              if($lan=='en')
                echo '<li><a href="'.$row['urlname'].'" target="_blank">'.$row['nameen'].'</a></li>';
              else
                echo '<li><a href="'.$row['urlname'].'" target="_blank">'.$row['name'].'</a></li>';
            }
          ?>
        </ul>
      </article>
      <article>
        <?php
        $contact = $groups->getById(CONTACT);
        $contact = $conn->fetchArray($contact);
        ?>
        <h3><?php if($lan=='en') echo $contact['nameen']; else echo $contact['name'];?></h3>
        <p><?php if($lan=='en') echo $about['shortcontentsen']; else echo $about['shortcontents'];?></p>
        <ul class="actions">
          <li><a href="<?php if($lan=='en') echo 'en/'; echo $contact['urlname'] ?>" class="button big">Read More</a></li>
        </ul>
      </article>
    </div>
  </section>