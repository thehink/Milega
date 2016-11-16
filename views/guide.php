<div class="content">
  <div class="guide-wrapper">
    <div class="guide-content">
      <?php if($guide === 'intro') : ?>
      <p class="bold">Välkommen till Milegas ledarskapsutbildning!</p>
      <p>Här kommer en kort introduktion om vad de olika delarna på hemsidan består av.
        Utbildningen är till för att ge dig verktygen för att kunna reflektera över
        din ledarroll och hjälpa dig sätta rätt prioriteringar för att utvecklas som ledare.
      </p>
        <p>
        Detta är mer än en kurs. Det är snarare ett underlag för din fortsatta utveckling som ledare. När själva kursen är klar så kan du uppdatera materialet (förutom JTI-testet) för att följa din utveckling och ändra vilka prioriteringar du ska lägga upp allt eftersom tiden går.
      </p>
      <?php endif; ?>
      <?php if($guide === 'profile') : ?>
      <p>Under fliken <b>Profil</b> finns tre funktioner.</p>

      <p>
        JTI-profilen: Här får du svaret på vad för typ av
        JTI-profil du är, utifrån JTI-testet.
      </p>

      <p>
      Ledarskapsgraf: Här ställer du in hur du definerar dina ledarskapskvalitéer och kan se din personliga utveckling med hjälp av grafer.
      </p>

      <p>
      Påminnelser: Här ställer du in hur ofta du vill få påminnelser om att uppdatera materialet,
      och därmed följa din egen personliga ledarskapsutveckling. Du kan även ställa in om
      du vill få dina påminnelser via sms eller e-mail.</p>
      <?php endif; ?>
      <?php if($guide === 'material') : ?>
      <p>
        Under fliken <b>Material</b> finner du frågor som du ska besvara under kursen. När kursen är klar så har du möjlighet att editera din text allt eftersom du utvecklas.
      </p>
      <p>
        Under fliken <b>Bilagor</b> finner du föreläsningsmaterial som du får under kursen. Här har Milega möjlighet att lägga till nytt material.</p>
      </p>
      <?php endif; ?>
    </div>
    <div class="guide-nav-buttons">
      <?php

      $leftHidden = false;
      $leftUrl = '/guide/intro';
      $rightHidden = false;
      $rightUrl = '/guide/profile';
      $success = false;

      if($guide === 'intro'){
        $leftHidden = true;
        $rightUrl = '/guide/profile';
      }

      if($guide === 'profile'){
        $leftHidden = false;
        $rightUrl = '/guide/material';
      }

      if($guide === 'material'){
        $leftHidden = false;
        $rightUrl = '/course';
        $leftUrl = '/guide/profile';
        $success = true;
      }

       ?>

      <a class="left-arrow<?=$leftHidden ? ' hidden' : ''?>" href="<?=$leftUrl?>"></a>
      <a class="cross" href="/course"></a>
      <a class="<?=$success ? 'success' : 'right-arrow'?><?=$rightHidden ? ' hidden' : ''?>" href="<?=$rightUrl?>"></a>
    </div>
  </div>
</div>
