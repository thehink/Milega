<div class="content">
  <div class="content-course">
    <h1>Dag <?=$day?></h1>
    <h2><? if ($day == 1): ?> Målet med mitt ledarskap <? endif; ?>
        <? if ($day == 2): ?> Mina styrkor och utvecklingsområden <? endif; ?>
    </h2>
    <div class="content-form">

      <? if ($day ==2): ?>
      <p>
        Detta är första övningen du gör i att färdigställa målet med ditt ledarskap.
        Dokumentet kommer att vara levande under hela utbildningen och det är meningen att du skall fylla på allteftersom du tillför mer kunskaper om dig själv och vad du vill göra i din roll som ledare.
        Dag 7 kommer du att inför gruppen kort få redogöra för hur långt ditt arbete med detta kommit.
      </p>
      <br>
      <p>
        Denna första öving är uppdelad i tre olika moment. I den första individuella övningen reflkterar du över din JTI. I den andra individuella övningen kartlägger du dig själv utifrån ditt uppdrag.
      </p>
      <br>
      <p>
        Därefter skall du i del 3 dels arbeta med en individuell kompetensprofil samt- i anslutning till denna- träffa en person i gruppen som skall "coacha" dig så att du får feedback på dina specifika kompetensområden.
      </p>
      <br>
      <h3 class="bold">Mina styrkor och svagheter utifrån min JTI-profil</h3>

      <h2 class="bold"><u>Visa min JTI-profil</u> </h2>
      <div class="right"></div>
      <br>
      <? endif; ?>

      <?php foreach ($questions as $question) : ?>
      <p>
        <?=$question->question?>
      </p>
        <div class="button-day-form" onclick="showTextarea('text<?=$question->id?>', 'button<?=$question->id?>')">
          <a href="#"></a>
        </div>

        <textarea id="text<?=$question->id?>" class="textarea" disabled="true"  ><?=$question->answer ? $question->answer->answer : ''?></textarea>
        <button id="button<?=$question->id?>" class="saveButton" type="submit" name="saveButton" onclick="closeTextarea('text<?=$question->id?>', 'button<?=$question->id?>')">Spara</button>
      <?php endforeach; ?>
    </div>

  </div>
</div>
