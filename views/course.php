<div class="content">
  <div class="content-course">
    <h1>Dag <?=$day?></h1>
    <h2>Målet med mitt ledarskap</h2>
    <div class="content-form">
      <?php foreach ($questions as $question) : ?>
      <p>
        <?=$question->question?>
      </p>
        <div class="button-day-form" onclick="showTextarea('text<?=$question->id?>', 'button<?=$question->id?>')">
          <a href="#"></a>
        </div>

        <textarea id="text<?=$question->id?>" class="textarea" disabled="true"><?=$question->answer ? $question->answer->answer : ''?></textarea>
        <button id="button<?=$question->id?>" class="saveButton" type="submit" name="saveButton" onclick="closeTextarea('text<?=$question->id?>', 'button<?=$question->id?>')">SPARA</button>
      <?php endforeach; ?>
      <div class="guide-nav-buttons">
        <a class="left-arrow hidden" href="/guide/intro"></a>
        <a class="right-arrow" href="/course/2"></a>
      </div>
    </div>

  </div>
</div>
