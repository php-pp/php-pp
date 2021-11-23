#!/usr/bin/env bash

set -eu

source "${ROOT_DIR}"/bin/synchronize/dockerise.inc.bash
source "${ROOT_DIR}"/config/github.inc.bash

readonly GIT_BRANCH="${1-}"
if [ "${GIT_BRANCH}" == "" ]; then
    echo -e "\e[41m You have to pass first argument: GIT_BRANCH (example: 1.0). \e[0m"
    exit 1
fi

readonly RELEASE_TOKEN="${2-}"
if [ "${RELEASE_TOKEN}" == "" ]; then
    echo -e "\e[41m You have to pass second argument: RELEASE_TOKEN. \e[0m"
    exit 1
fi

if [ "${PACKAGE_TO_SYNCHRONIZE-}" == "" ]; then
    echo -e "\e[41m You have to set variable PACKAGE_TO_SYNCHRONIZE (example: core). \e[0m"
    exit 1
fi
readonly DIRECTORY_TO_SYNCHRONIZE="package/${PACKAGE_TO_SYNCHRONIZE}"

readonly READ_ONLY_REPOSITORY_URL="https://${RELEASE_TOKEN}@github.com/php-pp/${PACKAGE_TO_SYNCHRONIZE}.git"

readonly CLONE_DIR="/tmp/php-pp"
echo -e "> Cloning \e[33m${GITHUB_PHPPP_REPOSITORY}\e[0m into \e[33m${CLONE_DIR}\e[0m."
git \
    clone \
        --single-branch \
        --branch="${GIT_BRANCH}" \
        "${GITHUB_PHPPP_REPOSITORY}" \
        "${CLONE_DIR}"
cd "${CLONE_DIR}"

# Security to be sure we don't push unwanted commits to origin
echo ""
echo -e "> Remove remote \e[33morigin\e[0m"
git remote remove origin

echo ""
echo -e "> Filter branch in directory \e[33m${DIRECTORY_TO_SYNCHRONIZE}\e[0m"
# Remove an useless warning by git
FILTER_BRANCH_SQUELCH_WARNING=1 \
    git \
        filter-branch \
            --prune-empty \
            --subdirectory-filter "${DIRECTORY_TO_SYNCHRONIZE}" \
            --force \
            "${GIT_BRANCH}"

echo ""
echo -e "> Push to \e[33m${READ_ONLY_REPOSITORY_URL}\e[0m"
git push "${READ_ONLY_REPOSITORY_URL}" "${GIT_BRANCH}"
