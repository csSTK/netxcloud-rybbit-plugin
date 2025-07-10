#!/bin/bash

# Rybbit Tracking Plugin Release Builder
# This script creates release archives for the Nextcloud plugin

set -e

# Configuration
PLUGIN_NAME="rybbit"
VERSION=$(grep -oP '<version>\K[^<]+' appinfo/info.xml)
RELEASE_DIR="releases"
ARCHIVE_NAME="${PLUGIN_NAME}-${VERSION}.tar.gz"

echo "🚀 Building Rybbit Tracking Plugin Release v${VERSION}"

# Create release directory if it doesn't exist
mkdir -p "$RELEASE_DIR"

# Clean previous release
rm -f "$RELEASE_DIR/${ARCHIVE_NAME}"

# Create temporary directory for building
TEMP_DIR=$(mktemp -d)
BUILD_DIR="$TEMP_DIR/$PLUGIN_NAME"

echo "📁 Preparing files in $BUILD_DIR"

# Copy all necessary files
mkdir -p "$BUILD_DIR"
cp -r appinfo/ "$BUILD_DIR/"
cp -r lib/ "$BUILD_DIR/"
cp -r templates/ "$BUILD_DIR/"
cp -r js/ "$BUILD_DIR/"
cp composer.json "$BUILD_DIR/"
cp README.md "$BUILD_DIR/"
cp LICENSE "$BUILD_DIR/"
cp CHANGELOG.md "$BUILD_DIR/"

# Remove debug files from release
rm -f "$BUILD_DIR/js/rybbit-debug.js"

echo "📦 Creating archive: $ARCHIVE_NAME"

# Create the archive
cd "$TEMP_DIR"
tar -czf "$ARCHIVE_NAME" "$PLUGIN_NAME"

# Move to release directory
cd -
mv "$TEMP_DIR/$ARCHIVE_NAME" "$RELEASE_DIR/"

# Cleanup
rm -rf "$TEMP_DIR"

echo "✅ Release created: $RELEASE_DIR/$ARCHIVE_NAME"
echo ""
echo "📋 Release Info:"
echo "   Plugin: $PLUGIN_NAME"
echo "   Version: $VERSION"
echo "   Archive: $RELEASE_DIR/$ARCHIVE_NAME"
echo "   Size: $(ls -lh $RELEASE_DIR/$ARCHIVE_NAME | awk '{print $5}')"
echo ""
echo "🎯 Next steps:"
echo "1. Test the archive: tar -tzf $RELEASE_DIR/$ARCHIVE_NAME"
echo "2. Upload to GitHub Releases"
echo "3. Update documentation"
