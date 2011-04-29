<?php use_stylesheet('jquery.ui.stars/jquery.ui.stars.min.css') ?>
<?php use_stylesheet('jquery.ui.stars/jquery.ui.stars.changes.css') ?>

<form>
  Rating: <span class="rating-overall"></span>
  <div class="rating-wrapper" data-value="<?php echo intval($rating->getAverage()) ?>">
    <input type="radio" name="overall" value="1" title="Very poor" />
    <input type="radio" name="overall" value="2" title="Poor" />
    <input type="radio" name="overall" value="3" title="Average" />
    <input type="radio" name="overall" value="4" title="Good" />
    <input type="radio" name="overall" value="5" title="Excelent!" />
  </div>
</form>