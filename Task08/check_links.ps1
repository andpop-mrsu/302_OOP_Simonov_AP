# Содержимое файла Task08/check_links.ps1
$desktop = [Environment]::GetFolderPath("Desktop")
$badLinksDir = Join-Path $desktop "BadLinks"

if (-not (Test-Path $badLinksDir)) {
    New-Item -Path $badLinksDir -ItemType Directory | Out-Null
}

$shell = New-Object -ComObject WScript.Shell
Get-ChildItem -Path $desktop -Filter *.lnk | ForEach-Object {
    $shortcut = $shell.CreateShortcut($_.FullName)
    if (-not (Test-Path $shortcut.TargetPath)) {
        Move-Item $_.FullName -Destination $badLinksDir
    }
}
