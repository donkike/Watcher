<h1>Directors List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($directors as $director): ?>
    <tr>
      <td><a href="<?php echo url_for('director/edit?id='.$director->getId()) ?>"><?php echo $director->getId() ?></a></td>
      <td><?php echo $director->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('director/new') ?>">New</a>
