<?php

class FileManipulator
{
    // ファイルの内容を読み込む
    public static function readFile($filePath)
    {
        if (!file_exists($filePath)) {
            throw new Exception("File not found: $filePath");
        }

        return file_get_contents($filePath);
    }

    // ファイルに内容を書き込む
    public static function writeFile($filePath, $content)
    {
        file_put_contents($filePath, $content);
    }

    // ファイルをコピーする
    public static function copyFile($source, $destination)
    {
        if (!file_exists($source)) {
            throw new Exception("Source file not found: $source");
        }

        copy($source, $destination);
    }

    // ファイルを削除する
    public static function deleteFile($filePath)
    {
        if (!file_exists($filePath)) {
            throw new Exception("File not found: $filePath");
        }

        unlink($filePath);
    }
}

// 使用例
try {
    // 読み込み
    $content = FileManipulator::readFile('input.md');
    echo "Content of input.md:\n$content\n";

    // 書き込み
    FileManipulator::writeFile('output.txt', $content);

    // コピー
    FileManipulator::copyFile('output.txt', 'copy_output.txt');

    // 削除
    FileManipulator::deleteFile('copy_output.txt');
    echo "File operations completed successfully.\n";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . "\n";
}
?>
