[![](https://poggit.pmmp.io/shield.state/WorldCommandBlocker)](https://poggit.pmmp.io/p/WorldCommandBlocker)

[![](https://poggit.pmmp.io/shield.api/WorldCommandBlocker)](https://poggit.pmmp.io/p/WorldCommandBlocker)

# WorldCommandBlocker

**Block commands by worlds with WorldCommandBlocker, only for PocketMine-MP 5.0 servers**
![20220820_231518](https://user-images.githubusercontent.com/83558341/185775351-2edbebaa-1aeb-453f-ba58-d58a492c4243.png)
<a href="https://discord.gg/YyE9XFckqb"><img src="https://img.shields.io/discord/837701868649709568?label=discord&color=7289DA&logo=discord" alt="Discord" /></a>

### 🌍 Wiki
* Check our plugin [wiki](https://github.com/fernanACM/WorldCommandBlocker/wiki) for features and secrets in the...

### 💡 Implementations
* [X] Configuration
* [x] Sounds
* [X] Permissions
* [x] Message customization

### 💾 Config 
```yaml
 # __        __   ____   ____  
 # \ \      / /  / ___| | __ ) 
 #  \ \ /\ / /  | |     |  _ \ 
 #   \ V  V /   | |___  | |_) |
 #    \_/\_/     \____| |____/ 
 #         by fernanACM
 # Block commands by worlds with WorldCommandBlocker, only for PocketMine-MP 5.0 servers.
 # Bloquea comandos en cierto mundo con mucha facilidad en la config.yml

# Prefix:
Prefix: "&l&7[&cWCB&7]&8»&r "
# Config version:
config-version: "2.0.0"
# =======(SETTINGS)=======
# Error message, use "true" or "false" 
# to enable/disable this option
blocked-message: true
# Use:
# & => "§", color
# "{LINE}" => "\n",
# "{NAME}" => $player->getName(), // Player name
# "{WORLD}" => $player->getWorld()->getDisplayName(), // World name
error-message: "&cHey {NAME}!, this command is prohibited in &a{WORLD}&c."
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
### 🔒 Permissions
| Permission | Description |
|---------|-------------|
| ```worldcommandblocker.allow``` | Bypass required permissions |
| ```worldcommandblocker.allow.{worldName}``` | Execute commands with world name |
| ```worldcommandblocker.allow.{worldName}.(command)``` | Execute commands with the name of the world and the specific command |

### 📢 Report bug
* If you find any bugs in this plugin, please let me know via: [issues](https://github.com/fernanACM/WorldCommandBlocker/issues)

### 📞 Contact
| Redes | Tag | Link |
|-------|-------------|------|
| YouTube | fernanACM | [YouTube](https://www.youtube.com/channel/UC-M5iTrCItYQBg5GMuX5ySw) | 
| Discord | fernanACM#5078 | [Discord](https://discord.gg/YyE9XFckqb) |
| GitHub | fernanACM | [GitHub](https://github.com/fernanACM)
| Poggit | fernanACM | [Poggit](https://poggit.pmmp.io/ci/fernanACM)
****
