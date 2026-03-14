RUN apt-get update && apt-get upgrade -y \
    && apt-get install --no-install-recommends -y php8.2 php8.2-curl php8.2-mbstring php8.2-xml --fix-missing
