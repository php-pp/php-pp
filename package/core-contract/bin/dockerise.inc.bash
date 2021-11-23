#!/usr/bin/env bash

set -eu

if [ -z "${BIN_DIR-}" ]; then
    BIN_DIR="bin/ci"
fi

if [ -z "${DOCKER_IMAGE_NAME-}" ]; then
    DOCKER_IMAGE_NAME="${CI_DOCKER_IMAGE_NAME}"
fi

if [ -z "${I_AM_CORE_CONTRACT_DOCKER_CONTAINER:-}" ]; then
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
            --volume "${ROOT_DIR}":/app \
            --user "$(id -u)":"$(id -g)" \
            --entrypoint "${BIN_DIR}"/"$(basename "${0}")" \
            --workdir /app \
            --env I_AM_CORE_CONTRACT_DOCKER_CONTAINER=true \
            "${DOCKER_IMAGE_NAME}" \
            "${@}"
    exit 0
fi
