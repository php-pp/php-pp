#!/usr/bin/env bash

set -eu

if type docker > /dev/null 2>&1; then
    readonly isInDocker=false
else
    readonly isInDocker=true
fi

if [ -z "${BIN_DIR-}" ]; then
    BIN_DIR="bin"
fi

if [ -z "${DOCKER_IMAGE_NAME-}" ]; then
    DOCKER_IMAGE_NAME="${DOCKER_CI_IMAGE_NAME}"
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

    readonly coreContractPath=$(realpath "${ROOT_DIR}"/../core-contract)

    docker \
        run \
            --rm \
            --tty \
            ${interactiveParameter} \
            --volume "${ROOT_DIR}":/app \
            --volume ${coreContractPath}:${coreContractPath} \
            --user "$(id -u)":"$(id -g)" \
            --entrypoint "/app/${BIN_DIR}/$(basename "${0}")" \
            --workdir /app \
            --env HOST_ROOT_DIR="${ROOT_DIR}" \
            "${DOCKER_IMAGE_NAME}" \
            "${@}"

    exit 0
fi
