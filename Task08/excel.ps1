# Содержимое файла Task08/excel.ps1
$excel = New-Object -ComObject Excel.Application
$excel.Visible = $false
$workbook = $excel.Workbooks.Add()
$sheet = $workbook.Worksheets.Item(1)

$cell = $sheet.Cells.Item(2,2)
$cell.Value2 = "Привет от PowerShell"
$cell.Font.Size = 12
$cell.Font.Italic = $true

$user = $env:USERNAME
$comp = $env:COMPUTERNAME
$filename = "C:\Users\$user\Desktop\${user}_${comp}.xlsx"

$workbook.SaveAs($filename)
$workbook.Close($false)
$excel.Quit()
