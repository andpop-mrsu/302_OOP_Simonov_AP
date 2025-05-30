# Содержимое файла Task08/numbers.ps1
function Show-Date_Info {
    $date = Get-Date
    $day = $date.Day
    $month = $date.Month
    $year = $date.Year
    Write-Host "Сегодня: $($date.ToString("dd.MM.yyyy"))"

    foreach ($num in $day, $month, $year) {
        try {
            $info = Invoke-RestMethod -Uri "http://numbersapi.com/$num"
            Write-Host $info
        } catch {
            Write-Host "Не удалось получить информацию о числе $num"
        }
    }
}
