<?php

  $host = "localhost";
  $user = "root";
  $password = "";
  $dbname = "mydboop";

  $dsn = "mysql:host=$host;dbname=$dbname";
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

$executedMigrations = $pdo->query("SELECT * FROM migrations")->fetchAll(PDO::FETCH_ASSOC);

$migrationFiles = scandir(__DIR__."/migrations");

$batch=(int) $pdo->query("SELECT MAX(batch) FROM migrations")->fetchColumn() +1;

foreach($migrationFiles as $file){
    if ($file === '.' || $file === '..') {
        continue;
    }

    $className = convertToClassName(pathinfo($file, PATHINFO_FILENAME));
    if(!in_array($className, $executedMigrations) ){
        require __DIR__.'/migrations/'.$file;
        $migration = new $className();
        $pdo->exec($migration->up());
        $stmt=$pdo->prepare("INSERT INTO migrations (migration,batch) VALUES (:migration,:batch)");
        $stmt->execute(['migration'=>$className, 'batch'=>$batch]);
        echo "Migration $className  has been excuted successfuly.";
    }
}

function convertToClassName($file){
    $fileNameWithoutDate = preg_replace('/^(\d{4}_\d{2}_\d{2}_)/', '', $file);
    $parts=explode('_', $fileNameWithoutDate);
    $className='';
    foreach ($parts as $part)
    {
       $className .= ucfirst($part);

    }

    return $className;
}

