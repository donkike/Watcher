<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('movie/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
  <input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('movie/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'movie/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <dl>
        <dt>Title</dt><dd><?php echo $form['title']->render() ?></dd>
        <dt>Year</dt><dd><?php echo $form['year']->render() ?></dd>
        <dt>Genre</dt><dd><?php echo $form['genre_id']->render() ?></dd><?php echo link_to('add...', url_for('genre_new'), array('class' => 'add-link')) ?>
        <dt>Director</dt><dd><?php echo $form['director_id']->render() ?></dd><?php echo link_to('add...', url_for('director_new'), array('class' => 'add-link')) ?>
        <dt>Synopsis</dt><dd><?php echo $form['synopsis']->render() ?></dd>
        <dt>Image Link</dt><dd><?php echo $form['image_link']->render() ?></dd>
        <dt>Trailer Link</dt><dd>http://www.youtube.com/watch?v=<?php echo $form['trailer_link']->render() ?></dd>
        <?php echo $form['_csrf_token']->render() ?>
      </dl>
    </tbody>
  </table>
</form>
