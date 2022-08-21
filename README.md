[![](https://poggit.pmmp.io/shield.state/WorldCommandBlocker)](https://poggit.pmmp.io/p/WorldCommandBlocker)

[![](https://poggit.pmmp.io/shield.api/WorldCommandBlocker)](https://poggit.pmmp.io/p/WorldCommandBlocker)

# WorldCommandBlocker

**Block commands by worlds with WorldCommandBlocker, only for PocketMine-MP 4.0 servers**
![20220820_231518](https://user-images.githubusercontent.com/83558341/185775351-2edbebaa-1aeb-453f-ba58-d58a492c4243.png)
<a href="https://discord.gg/YyE9XFckqb"><img src="https://img.shields.io/discord/837701868649709568?label=discord&color=7289DA&logo=discord" alt="Discord" /></a>

### 💡 Implementations
* [X] Configuration
* [x] Sounds.
* [x] Message customization.
* [X] MultiLanguage support.
* [x] Keys in (language).yml.

### 💾 Config 
```yaml
  # __        __   ____   ____  
  # \ \      / /  / ___| | __ ) 
  #  \ \ /\ / /  | |     |  _ \ 
  #   \ V  V /   | |___  | |_) |
  #    \_/\_/     \____| |____/ 
  #         by fernanACM
  # Block commands by worlds with WorldCommandBlocker, only for PocketMine-MP 4.0 servers.
  # Bloquea comandos en cierto mundo con mucha facilidad en la config.yml

  # =======(SETTINGS)=======
  # Error message, use "true" or "false" 
  # to enable/disable this option
  blocked-message: true
  # Types languages:

  # "eng" => English - default
  # "spa" => Spanish
  # "indo" => Indonesian
  # "ger" => German
  # "frc" => French
  # "portg" => Portuguese
  language: eng
  # Here you will be able to block many 
  # commands with the following example:

  # ===================== #
  # Settings:             #
  #   blocked-commands:   #
  #     world name:       #
  #       - commando here #
  #       - gamemode      #
  # ===================== #

  Settings:
    blocked-commands:
      world:
        - gamemode
        - me
        - say
      Lobby:
        - tp
        - ah
        - sethome
      Mine:
        - sethome
        - me
```
### 🌐 MultiLanguage
* [English](https://github.com/fernanACM/WorldCommandBlocker/blob/PM4/resources/languages/eng.yml)
* [Spanish](https://github.com/fernanACM/WorldCommandBlocker/blob/PM4/resources/languages/spa.yml)
* [Indonesian](https://github.com/fernanACM/WorldCommandBlocker/blob/PM4/resources/languages/indo.yml)
* [German](https://github.com/fernanACM/WorldCommandBlocker/blob/PM4/resources/languages/ger.yml)
* [French](https://github.com/fernanACM/WorldCommandBlocker/blob/PM4/resources/languages/frc.yml)
* [Portuguese](https://github.com/fernanACM/WorldCommandBlocker/blob/PM4/resources/languages/portg.yml)

### 📞 Contact
| Redes | Tag | Link |
|-------|-------------|------|
| YouTube | fernanACM | [YouTube](https://www.youtube.com/channel/UC-M5iTrCItYQBg5GMuX5ySw) | 
| Discord | fernanACM#5078 | [Discord](https://discord.gg/YyE9XFckqb) |
| GitHub | fernanACM | [GitHub](https://github.com/fernanACM)
| Poggit | fernanACM | [Poggit](https://poggit.pmmp.io/ci/fernanACM)
****
