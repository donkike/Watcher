<h1>Watcher</h1>

<?php foreach($movies as $movie): ?>
  <div class="movie-index">
    <a href="<?php echo url_for('movie_show', $movie) ?>">Show</a>
    <h2><?php echo $movie->getTitle() ?></h2>    
    <div class="movie-info">
      <dl>
        <dt>Year</dt><dd><?php echo $movie->getYear() ?></dd>
        <dt>Director</dt><dd><?php echo $movie->getDirector()->getName() ?></dd>
      </dl>
      <p>
        <?php echo substr($movie->getSynopsis(), 0, 200) ?>
        <?php if (strlen($movie->getSynopsis()) > 200): ?>
          <?php echo '...' ?>
        <?php endif ?>
      </p>      
    </div>
    <?php if ($movie->getImageLink()): ?>
      <img src="/images/upload/<?php echo $movie->getImageLink() ?>" title="<?php echo $movie->getTitle() ?>" alt="No image found" />
    <?php endif ?>
  </div>
<?php endforeach ?>

<a href="<?php echo url_for('movie/new') ?>">New</a>
