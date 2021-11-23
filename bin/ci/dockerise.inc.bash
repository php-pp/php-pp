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
            --volume "${ROOT_DIR}":"${ROOT_DIR}" \
            --volume /usr/bin/docker:/usr/bin/docker \
            --volume /var/run/docker.sock:/var/run/docker.sock \
            --env I_AM_A_DOCKER_CONTAINER=true \
            --workdir "${ROOT_DIR}" \
            "${DOCKER_CI_IMAGE_NAME}" \
            "${ROOT_DIR}"/bin/ci/"$(basename "${0}")"

    exit 0
fi
