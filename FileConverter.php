<?php
require 'vendor/autoload.php'; // Composerのオートローダーを読み込む

use Parsedown;

// コマンドライン引数のチェック
if ($argc !== 4 || $argv[1] !== 'markdown') {
    echo "Usage: php FileConverter.php markdown inputfile outputfile\n";
    exit(1);
}

$inputFile = $argv[2];
$outputFile = $argv[3];

// 入力ファイルの存在チェック
if (!file_exists($inputFile)) {
    echo "Input file does not exist: $inputFile\n";
    exit(1);
}

// マークダウンの読み込み
$markdown = file_get_contents($inputFile);
$parsedown = new Parsedown();
$html = $parsedown->text($markdown);

// HTMLファイルの書き込み
file_put_contents($outputFile, $html);
echo "Converted $inputFile to $outputFile successfully.\n";
?>
