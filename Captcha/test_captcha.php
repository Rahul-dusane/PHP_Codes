<?php
// Test file to check if captcha is working
echo "<h2>Captcha Test Page</h2>";

// Check GD extension
if (extension_loaded('gd')) {
    echo "✅ GD extension is loaded<br>";
    
    // Check GD info
    $gd_info = gd_info();
    echo "GD Version: " . $gd_info['GD Version'] . "<br>";
    echo "JPEG Support: " . ($gd_info['JPEG Support'] ? 'Yes' : 'No') . "<br>";
} else {
    echo "❌ GD extension is NOT loaded<br>";
    echo "Please enable GD extension in your PHP configuration<br>";
}

echo "<br>";

// Test image creation
echo "<h3>Captcha Image Test:</h3>";
echo "<img src='Captcha.php' alt='Captcha Test' style='border: 1px solid #ccc;'>";

echo "<br><br>";
echo "<a href='Index.php'>Go to Main Form</a>";
?>
