# Mimir for Magento
This is a Magento module for CognitionHub's Mimir chatbot.


## Installation
1. Create a `CognitionHub/Mimir` directory under `app/code`.
2. Download the contents of this directory and put it in the newly created directory(`app/code/CognitionHub/Mimir`).
3. Run
```bash
php bin/magento cache:flush
php bin/magento setup:upgrade
```

## Configuration
For the chatbot to work correctly, you need to provide it with the name of your company. To do so, specify the company name in the admin panel under `Stores > Configuration > CognitionHub > Mimir Chatbot > Company`. 