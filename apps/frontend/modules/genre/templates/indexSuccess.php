<h1>Genres List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($genres as $genre): ?>
    <tr>
      <td><a href="<?php echo url_for('genre/edit?id='.$genre->getId()) ?>"><?php echo $genre->getId() ?></a></td>
      <td><?php echo $genre->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('genre/new') ?>">New</a>
