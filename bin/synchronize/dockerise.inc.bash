#!/usr/bin/env bash

set -eu

source "${ROOT_DIR}"/config/docker.inc.bash

if type docker > /dev/null 2>&1; then
    readonly isInDocker=false
else
    readonly isInDocker=true
fi

if ! ${isInDocker}; then
    set +e
    tty -s && isInteractiveShell=true || isInteractiveShell=false
    set -e

    if ${isInteractiveShell}; then
        interactiveParameter="--interactive"
    else
        interactiveParameter=
    fi

    docker \
        run \
            --rm \
            --tty \
            ${interactiveParameter} \
            --volume "${ROOT_DIR}"/bin/synchronize:/app/bin/synchronize \
            --volume "${ROOT_DIR}"/config/docker.inc.bash:/app/config/docker.inc.bash \
            --volume "${ROOT_DIR}"/config/github.inc.bash:/app/config/github.inc.bash \
            --entrypoint /app/bin/synchronize/"$(basename "${0}")" \
            --workdir /app \
            "${DOCKER_SYNCHRONIZE_IMAGE_NAME}" \
            "${@}"

    exit 0
fi
