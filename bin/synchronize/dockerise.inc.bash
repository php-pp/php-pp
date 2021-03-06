#!/usr/bin/env bash

set -eu

source "${ROOT_DIR}"/config/docker.inc.bash

if [ -z "${I_AM_A_DOCKER_CONTAINER:-}" ]; then
    set +e
    tty -s && isInteractiveShell=true || isInteractiveShell=false
    set -e

    if ${isInteractiveShell}; then
        readonly DOCKER_RUN_INTERACTIVE="--interactive"
    else
        readonly DOCKER_RUN_INTERACTIVE=
    fi

    docker \
        run \
            --rm \
            --tty \
            ${DOCKER_RUN_INTERACTIVE} \
            --volume "${ROOT_DIR}"/bin/synchronize:/app/bin/synchronize \
            --volume "${ROOT_DIR}"/config/docker.inc.bash:/app/config/docker.inc.bash \
            --volume "${ROOT_DIR}"/config/github.inc.bash:/app/config/github.inc.bash \
            --env I_AM_A_DOCKER_CONTAINER=true \
            --entrypoint /app/bin/synchronize/"$(basename "${0}")" \
            --workdir /app \
            "${DOCKER_SYNCHRONIZE_IMAGE_NAME}" \
            "${@}"

    exit 0
fi
