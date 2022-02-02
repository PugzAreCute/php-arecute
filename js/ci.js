let hasSettingsBeenOpened = false;
function openSettings(){
    console.debug("Settings icon has been clicked!")
    if (hasSettingsBeenOpened === false) {
        document.getElementsByClassName("settings_popup")[0].style.display = "inline"
        hasSettingsBeenOpened=true
    }else{
        document.getElementsByClassName("settings_popup")[0].style.display = "none"
        hasSettingsBeenOpened=false
    }
}