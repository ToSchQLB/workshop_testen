set curFolder=%cd%
#start cmd /k test-env\start.bat
start cmd /k test-env\start_neu_ff.bat
start cmd /k yii.bat serve --port=8082