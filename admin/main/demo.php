<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <div class="container mt-5">
    <form action="" method="post" class="mb-3">
      <div class="select-block">
        <select name="Fruit">
          <option value="" disabled selected>Choose option</option>
          <option value="Apple">Apple</option>
          <option value="Banana">Banana</option>
          <option value="Coconut">Coconut</option>
          <option value="Blueberry">Blueberry</option>
          <option value="Strawberry">Strawberry</option>
        </select>
        <div class="selectIcon">
          <svg focusable="false" viewBox="0 0 104 128" width="25" height="35" class="icon">
            <path d="m2e1 95a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm14 55h68v1e1h-68zm0-3e1h68v1e1h-68zm0-3e1h68v1e1h-68z"></path>
          </svg>
        </div>
      </div>

      <input type="submit" name="submit" vlaue="Choose options">
    </form>

    <?php
      if(isset($_POST['submit'])){
        if(!empty($_POST['Fruit'])) {
          $selected = $_POST['Fruit'];?>
          <script type="text/javascript">alert("hello")</script><?php
          echo 'You have chosen: ' . $selected;
        } else {
          echo 'Please select the value.';
        }
      }
    ?>
  </div>

</body>
</html>
