<?php use_stylesheet('jquery.ui.stars/jquery.ui.stars.min.css') ?>
<?php use_stylesheet('jquery.ui.stars/jquery.ui.stars.changes.css') ?>

<form>
  <?php if ($caption): ?>
    Rating: <span class="rating-caption"></span>
  <?php endif ?>
  <div class="rating-wrapper" data-value="<?php echo round($rating->getAverage()) ?>">
    <input type="radio" name="rating" value="1" title="Very poor" />
    <input type="radio" name="rating" value="2" title="Poor" />
    <input type="radio" name="rating" value="3" title="Not that bad" />
    <input type="radio" name="rating" value="4" title="Fair" />
    <input type="radio" name="rating" value="5" title="Average" />
    <input type="radio" name="rating" value="6" title="Almost good" />
    <input type="radio" name="rating" value="7" title="Good" />
    <input type="radio" name="rating" value="8" title="Very good" />
    <input type="radio" name="rating" value="9" title="Excelent" />
    <input type="radio" name="rating" value="10" title="Perfect!" />
  </div>
</form>